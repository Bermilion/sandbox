# Этапы развития пакета chunker2i/base

## Анализ текущего состояния и концепции

На основе анализа `@[chunker2i/base/readme.md]` и `@[docs/offers/concept.md]` определены следующие ключевые направления развития:

**Текущие сильные стороны chunker2i/base:**
- Продвинутая SCSS-архитектура с OKLCH цветовой системой
- Модульная структура с использованием современных Sass modules
- BEM-совместимость через `ModifiersTrait`
- Laravel-интеграция через ServiceProvider

**Концептуальные принципы из Flux для внедрения:**
- "Одного умного компонента" - минимизация API через контекст
- Автоопределение поведения на основе использования
- Fluent API для CSS-классов
- Бесшовная Livewire-интеграция

---

## Этап 1: Фундаментальное ядро (Core Foundation)

### 1.1. Создание Core Layer

**Цель:** Построить фундаментальную архитектуру для умных компонентов

**Задачи:**
- [ ] Создать `src/Core/ClassBuilder.php` - Fluent конструктор CSS-классов
- [ ] Реализовать `src/Core/ComponentManager.php` - Singleton менеджер компонентов
- [ ] Разработать `src/Core/AttributeResolver.php` - разрешение атрибутов из разных источников
- [ ] Создать `src/Core/StateManager.php` - управление состоянием компонентов

**Пример реализации ClassBuilder:**
```php
<?php namespace Chunker2i\Base\Core;

class ClassBuilder
{
    private array $classes = [];
    
    public function add(string $classes): self
    {
        $this->classes[] = $classes;
        return $this;
    }
    
    public function addIf(bool $condition, string $classes): self
    {
        if ($condition) {
            $this->classes[] = $classes;
        }
        return $this;
    }
    
    public function addMatch(mixed $value, array $cases): self
    {
        $this->classes[] = match($value) {
            default => $cases[$value] ?? '',
        };
        return $this;
    }
    
    public function toString(): string
    {
        return implode(' ', array_filter($this->classes));
    }
}
```

### 1.2. Расширение ServiceProvider

**Модификация `src/Providers/AppServiceProvider.php`:**
```php
public function register(): void
{
    // Регистрация синглтона менеджера
    $this->app->singleton(ComponentManager::class, fn() => ComponentManager::getInstance());
    
    // Регистрация ClassBuilder
    $this->app->bind(ClassBuilder::class, fn() => new ClassBuilder());
}

public function boot(): void
{
    // Существующая логика публикации SCSS
    
    // Новые директивы Blade
    Blade::directive('classes', fn($expression) => "<?php echo app(Chunker2i\\Base\\Core\\ClassBuilder::class){$expression}->toString(); ?>");
    
    // Регистрация компонентов
    Blade::componentNamespace('Chunker2i\\Base\\View\\Components', 'chunker');
}
```

---

## Этап 2: Умные компоненты (Smart Components)

### 2.1. Базовый абстрактный компонент

**Создать `src/View/Components/AbstractComponent.php`:**
```php
<?php namespace Chunker2i\Base\View\Components;

use Illuminate\View\Component;
use Chunker2i\Base\Core\ComponentManager;
use Chunker2i\Base\Core\ClassBuilder;

abstract class AbstractComponent extends Component
{
    protected ComponentManager $manager;
    protected ClassBuilder $classBuilder;
    
    public function __construct()
    {
        $this->manager = app(ComponentManager::class);
        $this->classBuilder = app(ClassBuilder::class);
    }
    
    protected function resolveAutoLoading(array $attributes): bool
    {
        return isset($attributes['wire:click']) && 
               !str_starts_with($attributes['wire:click'], '$js.');
    }
    
    protected function resolveSquareForm($slot): bool
    {
        return method_exists($slot, 'isEmpty') ? $slot->isEmpty() : empty($slot);
    }
    
    protected function resolveIconVariant(string $size, bool $square = false): string
    {
        return match($size) {
            'xs' => 'micro',
            default => $square ? 'mini' : 'micro',
        };
    }
}
```

### 2.2. Компонент Button с умным поведением

**Создать `src/View/Components/Button.php`:**
```php
<?php namespace Chunker2i\Base\View\Components;

class Button extends AbstractComponent
{
    public string $variant;
    public string $size;
    public ?string $icon;
    public bool $loading;
    public bool $square;
    public string $iconVariant;
    
    public function __construct(
        string $variant = 'primary',
        string $size = 'base',
        ?string $icon = null,
        ?bool $loading = null,
        ?bool $square = null,
        ?string $iconVariant = null
    ) {
        parent::__construct();
        
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;
        
        // Автоопределение состояния загрузки
        $this->loading = $loading ?? false;
        
        // Автоопределение квадратной формы
        $this->square = $square ?? false;
        
        // Автоопределение варианта иконки
        $this->iconVariant = $iconVariant ?? $this->resolveIconVariant($size, $this->square);
    }
    
    public function render()
    {
        return view('chunker::button');
    }
    
    public function classes(): string
    {
        return $this->classBuilder
            ->add('relative items-center font-medium justify-center')
            ->add($this->square ? 'aspect-square' : 'px-4')
            ->addMatch($this->variant, [
                'primary' => 'bg-accent hover:bg-accent-dark text-white',
                'outline' => 'border border-zinc-300 bg-white hover:bg-zinc-50',
                'ghost' => 'bg-transparent hover:bg-zinc-100',
                'danger' => 'bg-red-500 text-white hover:bg-red-600',
            ])
            ->addMatch($this->size, [
                'xs' => 'px-2 py-1 text-xs',
                'sm' => 'px-3 py-1.5 text-sm',
                'base' => 'px-4 py-2 text-base',
                'lg' => 'px-6 py-3 text-lg',
            ])
            ->addIf($this->loading, 'opacity-75 cursor-not-allowed')
            ->toString();
    }
}
```

### 2.3. Шаблон компонента

**Создать `resources/views/components/button.blade.php`:**
```php
@php
    // Автоопределение из атрибутов
    $icon = $icon ?? $attributes->pluck('icon');
    $loading = $loading ?? $resolveAutoLoading($attributes->getAttributes());
    $square = $square ?? $resolveSquareForm($slot);
    
    // Livewire интеграция
    if ($loading && isset($attributes['wire:click'])) {
        $method = $attributes->get('wire:click');
        $attributes = $attributes->merge([
            'wire:loading.attr' => 'data-loading',
            'wire:target' => $method,
        ]);
    }
@endphp

@if (isset($attributes['href']))
    <a {{ $attributes->merge(['class' => $classes()]) }}>
        @if($icon && !$square)
            <x-chunker::icon name="{{ $icon }}" variant="{{ $iconVariant }}" class="mr-2" />
        @endif
        
        {{ $slot }}
        
        @if($icon && $square)
            <x-chunker::icon name="{{ $icon }}" variant="{{ $iconVariant }}" />
        @endif
    </a>
@else
    <button type="{{ $type ?? 'button' }}" {{ $attributes->merge(['class' => $classes()]) }}>
        @if($icon && !$square)
            <x-chunker::icon name="{{ $icon }}" variant="{{ $iconVariant }}" class="mr-2" />
        @endif
        
        {{ $slot }}
        
        @if($icon && $square)
            <x-chunker::icon name="{{ $icon }}" variant="{{ $iconVariant }}" />
        @endif
        
        @if($loading)
            <x-chunker::icon name="spinner" variant="micro" class="ml-2 animate-spin" />
        @endif
    </button>
@endif
```

---

## Этап 3: Расширенная SCSS-архитектура

### 3.1. Адаптация цветовой системы под компоненты

**Создать `resources/scss/ui/_variables.scss`:**
```scss
@use "../core/colors" as colors;
@use "../utils/css-variables" as css-vars;

// Генерация CSS-переменных для компонентов
:root {
  // Цвета кнопок
  @each $name, $color in colors.get-base-colors() {
    --btn-#{$name}-bg: #{colors.to-oklch($color)};
    --btn-#{$name}-hover: #{colors.darken($color, 10%)};
    --btn-#{$name}-text: #{colors.get-contrast($color)};
  }
  
  // Состояния
  --btn-loading-opacity: 0.75;
  --btn-disabled-opacity: 0.5;
}
```

### 3.2. Компонентные стили с групповой поддержкой

**Создать `resources/scss/ui/_button.scss`:**
```scss
@use "../config/scale" as scale;
@use "../core/viewports" as viewports;

// Базовые стили кнопки
.chunker-btn {
  @apply relative inline-flex items-center justify-center font-medium;
  @apply transition-all duration-200 ease-in-out;
  @apply focus:outline-none focus:ring-2 focus:ring-offset-2;
  
  // Размеры
  &--xs { @apply px-2 py-1 text-xs; }
  &--sm { @apply px-3 py-1.5 text-sm; }
  &--base { @apply px-4 py-2 text-base; }
  &--lg { @apply px-6 py-3 text-lg; }
  
  // Квадратная форма
  &--square { @apply aspect-square; }
  
  // Варианты
  &--primary {
    background-color: var(--btn-primary-bg);
    color: var(--btn-primary-text);
    
    &:hover { background-color: var(--btn-primary-hover); }
  }
  
  &--outline {
    @apply border border-zinc-300 bg-white;
    @apply hover:bg-zinc-50;
  }
  
  &--ghost {
    @apply bg-transparent;
    @apply hover:bg-zinc-100;
  }
  
  &--danger {
    background-color: var(--btn-danger-bg, #ef4444);
    color: var(--btn-danger-text, white);
    
    &:hover { background-color: var(--btn-danger-hover, #dc2626); }
  }
  
  // Состояния
  &--loading {
    opacity: var(--btn-loading-opacity);
    cursor: not-allowed;
  }
  
  &--disabled {
    opacity: var(--btn-disabled-opacity);
    cursor: not-allowed;
    pointer-events: none;
  }
}

// Групповая обработка
[data-chunker-group] {
  @apply inline-flex;
  
  > .chunker-btn:not(:first-child) {
    border-start-start-radius: 0;
    border-end-start-radius: 0;
  }
  
  > .chunker-btn:not(:last-child) {
    border-end-end-radius: 0;
    border-start-end-radius: 0;
  }
  
  // Специфичные границы для вариантов
  > .chunker-btn--outline:not(:first-child) {
    border-left-color: transparent;
  }
  
  > .chunker-btn--primary:not(:last-child) {
    border-right-color: transparent;
  }
}
```

---

## Этап 4: Интеграция с экосистемой

### 4.1. Livewire интеграция

**Создать `src/Traits/InteractsWithChunker.php`:**
```php
<?php namespace Chunker2i\Base\Traits;

trait InteractsWithChunker
{
    public function chunkerModal(string $name, array $params = []): void
    {
        $this->dispatch('chunker:modal-show', name: $name, ...$params);
    }
    
    public function chunkerToast(string $message, string $type = 'info'): void
    {
        $this->dispatch('chunker:toast-show', message: $message, type: $type);
    }
    
    public function chunkerLoading(string $componentId, bool $state = true): void
    {
        app(ComponentManager::class)->setLoading($componentId, $state);
    }
}
```

### 4.2. Alpine.js директивы

**Создать `resources/js/chunker-alpine.js`:**
```javascript
// Автоматическое управление фокусом
Alpine.directive('chunker-autofocus', (el) => {
    Alpine.nextTick(() => el.focus());
});

// Управление горячими клавишами
Alpine.directive('chunker-hotkey', (el, { expression }) => {
    const [key, action] = expression.split(':');
    
    el.addEventListener('keydown', (e) => {
        if (e.key === key) {
            e.preventDefault();
            el.dispatchEvent(new CustomEvent('chunker:hotkey', { 
                detail: { action } 
            }));
        }
    });
});

// Автоматическое управление loading состоянием
Alpine.directive('chunker-loading', (el, { expression }) => {
    const componentId = expression || el.id;
    
    // Слушаем события Livewire
    document.addEventListener('chunker:loading-start', (e) => {
        if (e.detail.componentId === componentId) {
            el.setAttribute('data-loading', '');
        }
    });
    
    document.addEventListener('chunker:loading-end', (e) => {
        if (e.detail.componentId === componentId) {
            el.removeAttribute('data-loading');
        }
    });
});
```

---

## Этап 5: Расширяемость и кастомизация

### 5.1. Система конфигурации

**Создать `config/chunker.php`:**
```php
<?php

return [
    'components' => [
        'button' => [
            'default_variant' => 'primary',
            'default_size' => 'base',
            'variants' => [
                'primary' => [
                    'classes' => 'bg-accent hover:bg-accent-dark text-white',
                    'allowed_sizes' => ['xs', 'sm', 'base', 'lg'],
                ],
                'outline' => [
                    'classes' => 'border border-zinc-300 bg-white hover:bg-zinc-50',
                    'allowed_sizes' => ['xs', 'sm', 'base', 'lg'],
                ],
                'ghost' => [
                    'classes' => 'bg-transparent hover:bg-zinc-100',
                    'allowed_sizes' => ['xs', 'sm', 'base', 'lg'],
                ],
            ],
        ],
    ],
    
    'icons' => [
        'default_variant' => 'micro',
        'variants' => [
            'micro' => ['size' => '16px'],
            'mini' => ['size' => '20px'],
            'small' => ['size' => '24px'],
        ],
    ],
    
    'auto_loading' => true,
    'auto_square' => true,
];
```

### 5.2. API для расширения

**Расширить `ComponentManager.php`:**
```php
public function registerVariant(string $component, string $name, array $config): void
{
    $this->config["components.{$component}.variants.{$name}"] = $config;
}

public function registerIcon(string $name, string $path): void
{
    $this->config["icons.custom.{$name}"] = $path;
}

public function getComponentConfig(string $component): array
{
    return $this->config["components.{$component}"] ?? [];
}
```

---

## Этап 6: Инструменты разработки

### 6.1. Artisan команды

**Создать `src/Commands/PublishComponentCommand.php`:**
```php
<?php namespace Chunker2i\Base\Commands;

use Illuminate\Console\Command;

class PublishComponentCommand extends Command
{
    protected $signature = 'chunker:publish {component?}';
    protected $description = 'Publish chunker component to project';
    
    public function handle(): int
    {
        $component = $this->argument('component');
        
        if (!$component) {
            $component = $this->choice(
                'Which component?',
                ['button', 'input', 'modal', 'toast']
            );
        }
        
        $this->call('vendor:publish', [
            '--tag' => "chunker-{$component}",
            '--force' => $this->confirm('Force overwrite?'),
        ]);
        
        $this->info("Component {$component} published successfully!");
        return self::SUCCESS;
    }
}
```

### 6.2. Тестирование компонентов

**Создать `tests/Feature/ButtonTest.php`:**
```php
<?php namespace Chunker2i\Base\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_renders_primary_button_by_default()
    {
        $view = $this->blade('<x-chunker::button>Click me</x-chunker::button>');
        
        $view->assertSee('chunker-btn--primary');
        $view->assertSee('Click me');
    }
    
    /** @test */
    public function it_auto_detects_square_form_without_text()
    {
        $view = $this->blade('<x-chunker::button icon="plus" />');
        
        $view->assertSee('chunker-btn--square');
        $view->assertSee('plus');
    }
    
    /** @test */
    public function it_adds_loading_state_for_wire_click()
    {
        $view = $this->blade(
            '<x-chunker::button wire:click="save">Save</x-chunker::button>'
        );
        
        $view->assertSee('wire:target="save"');
        $view->assertSee('wire:loading.attr="data-loading"');
    }
}
```

---

## Этап 7: Документация и примеры

### 7.1. Интерактивная документация

**Создать `resources/views/docs/index.blade.php`:**
```php
<x-chunker::layout>
    <div class="max-w-4xl mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">Chunker Base Components</h1>
        
        <!-- Примеры кнопок -->
        <section class="mb-12">
            <h2 class="text-2xl font-semibold mb-4">Buttons</h2>
            
            <div class="space-y-4">
                <!-- Базовые варианты -->
                <div class="flex gap-2">
                    <x-chunker::button>Primary</x-chunker::button>
                    <x-chunker::button variant="outline">Outline</x-chunker::button>
                    <x-chunker::button variant="ghost">Ghost</x-chunker::button>
                    <x-chunker::button variant="danger">Danger</x-chunker::button>
                </div>
                
                <!-- Размеры -->
                <div class="flex items-center gap-2">
                    <x-chunker::button size="xs">Extra Small</x-chunker::button>
                    <x-chunker::button size="sm">Small</x-chunker::button>
                    <x-chunker::button size="base">Base</x-chunker::button>
                    <x-chunker::button size="lg">Large</x-chunker::button>
                </div>
                
                <!-- С иконками -->
                <div class="flex gap-2">
                    <x-chunker::button icon="plus">Add</x-chunker::button>
                    <x-chunker::button icon="settings" />
                    <x-chunker::button icon="trash" variant="danger" />
                </div>
                
                <!-- Группы -->
                <div data-chunker-group>
                    <x-chunker::button>First</x-chunker::button>
                    <x-chunker::button variant="outline">Middle</x-chunker::button>
                    <x-chunker::button variant="outline">Last</x-chunker::button>
                </div>
            </div>
        </section>
    </div>
</x-chunker::layout>
```

---

## Заключение

### Ключевые преимущества развитого пакета:

1. **Минимальный API через контекст** - компоненты автоматически определяют поведение
2. **Современная SCSS-архитектура** - OKLCH цвета, модульность, производительность
3. **Бесшовная Laravel-интеграция** - Livewire, Blade директивы, конфигурация
4. **Расширяемость** - кастомные варианты, компоненты, иконки
5. **Инструменты разработки** - команды, тестирование, документация

### Порядок реализации:

1. **Фундамент** (Core Layer) - 2-3 недели
2. **Базовые компоненты** (Button, Input) - 2 недели  
3. **SCSS адаптация** - 1-2 недели
4. **Интеграция** (Livewire, Alpine) - 2 недели
5. **Расширяемость** - 2 недели
6. **Инструменты** - 1-2 недели
7. **Документация** - 1 неделя

**Итоговый срок:** ~12-14 недель для полной реализации

Развитие пакета `chunker2i/base` по этому плану позволит создать современную, мощную и удобную UI-библиотеку, сочетающую лучшие практики из Flux с существующей сильной SCSS-архитектурой.
