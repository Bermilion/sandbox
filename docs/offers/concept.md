# Концепция UI-библиотеки на основе архитектурных решений Flux

## 1. Философия и ключевые принципы

### 1.1. Концепция «Одного умного компонента»

**Принцип:** Вместо создания множества похожих компонентов — создаем один универсальный с контекстным поведением.

**Пример из Flux:**
- Компонент `Button` автоматически определяет квадратную форму при отсутствии текста
- Автоопределение состояния загрузки по `type="submit"` или `wire:click`
- Автовыбор размера иконки на основе размера кнопки

**Применение в библиотеке:**
```php
// Вместо: <x-icon-button icon="plus" />
// Используем: <x-button icon="plus"></x-button>

// Вместо: <x-loading-button />
// Используем: <x-button loading>Save</x-button>
```

### 1.2. API минимализм через контекст

**Принцип:** Поведение выводится из контекста использования, а не явной конфигурации.

| Контекст | Автоопределенное поведение |
|----------|---------------------------|
| `wire:click` + не `$js.*` | Активация loading-состояния |
| `$slot->isEmpty()` | Квадратная форма кнопки |
| `size="xs"` | Иконка варианта `micro` |
| `type="submit"` | Обработка Enter, loading при отправке |

### 1.3. Fluent API для CSS-классов

**Паттерн `ClassBuilder`:**
```php
Flux::classes()
    ->add('relative items-center font-medium justify-center')
    ->add($square ? 'aspect-square' : 'px-4')
    ->add(match($variant) {
        'primary' => 'bg-accent hover:bg-accent-dark',
        'outline' => 'border border-zinc-300',
        default => '',
    })
    ->toString();
```

**Преимущества:**
- Условная логика отделена от конкатенации строк
- Читаемость при большом количестве вариантов
- Возможность ленивого вычисления

## 2. Архитектурные слои

### 2.1. Уровень ядра (Core Layer)

```
src/
├── Core/
│   ├── ClassBuilder.php          # Конструктор CSS-классов
│   ├── ComponentManager.php      # Центральный менеджер компонентов
│   ├── AttributeResolver.php     # Разрешение атрибутов из разных источников
│   └── StateManager.php          # Управление состоянием компонентов
```

**ComponentManager (Singleton)**
```php
class ComponentManager
{
    private static ?self $instance = null;
    private array $config = [];
    private array $activeStates = [];

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    // Регистрация глобальных настроек
    public function setConfig(string $key, mixed $value): void;

    // Управление состоянием loading
    public function isLoading(string $componentId): bool;
    public function setLoading(string $componentId, bool $state): void;
}
```

### 2.2. Уровень компонентов (Component Layer)

**Структура каждого компонента:**

```
resources/views/components/button/
├── index.blade.php       # Главный шаблон
├── variants/
│   ├── primary.blade.php
│   ├── outline.blade.php
│   └── ghost.blade.php
└── behaviors/
    ├── loading.blade.php
    ├── with-icon.blade.php
    └── grouped.blade.php
```

### 2.3. Уровень интеграции (Integration Layer)

**Service Provider:**
```php
class LibraryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Синглтон менеджера
        $this->app->singleton(ComponentManager::class, fn() => ComponentManager::getInstance());

        // Компилятор кастомных тегов
        Blade::directive('libraryStyles', fn() => '<?php echo app(AssetManager::class)->styles(); ?>');
        Blade::directive('libraryScripts', fn() => '<?php echo app(AssetManager::class)->scripts(); ?>');
    }

    public function boot(): void
    {
        // Регистрация компонентов
        Blade::componentNamespace('Library\\View\\Components', 'lib');
    }
}
```

## 3. Реализация компонентов

### 3.1. Паттерн «Извлечение атрибутов»

**Проблема:** Необходимость передавать иконки и специальные параметры через чистый синтаксис.

**Решение:**
```php
@php
// Извлечение из атрибутов с fallback на параметры
$iconLeading = $iconLeading ??= $attributes->pluck('icon:leading');
$iconTrailing = $iconTrailing ??= $attributes->pluck('icon:trailing');
$iconVariant = $iconVariant ??= $attributes->pluck('icon:variant');

// Алиасы для удобства
$iconLeading ??= $icon;
@endphp

<x-lib:button icon:leading="plus">Add</x-lib:button>
<x-lib:button icon:trailing="chevron-down">Menu</x-lib:button>
```

### 3.2. Паттерн «Автоконфигурация»

```php
@php
// Автоопределение квадратной формы
$square ??= $slot->isEmpty();

// Автоопределение варианта иконки
$iconVariant ??= match($size) {
    'xs' => 'micro',
    default => $square ? 'mini' : 'micro',
};

// Автоопределение состояния загрузки
$loading ??= (
    $type === 'submit' && !$attributes->has('disabled')
) || (
    $attributes->has('wire:click') &&
    !str_starts_with($attributes->get('wire:click'), '$js.')
);
@endphp
```

### 3.3. Паттерн «Семантическая обертка»

**Компонент выбора элемента (ButtonOrLink):**
```php
@if ($attributes->has('href'))
    <a {{ $attributes }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes }}>{{ $slot }}</button>
@endif
```

Использование:
```php
<x-button-or-link :attributes="$attributes" :type="$type">
    {{-- Содержимое --}}
</x-button-or-link>
```

### 3.4. Паттерн «Перехват Livewire»

**Автоматическое добавление loading-атрибутов:**
```php
@if ($loading)
    @php
        $attributes = $attributes
            ->merge([
                'wire:loading.attr' => 'data-loading',
            ]);

        // Добавление wire:target для scoped loading
        if ($attributes->has('wire:click')) {
            $method = $attributes->get('wire:click');
            $attributes = $attributes->merge([
                'wire:target' => $method,
            ]);
        }
    @endphp
@endif
```

## 4. CSS-архитектура

### 4.1. Принципы именования классов

**Варианты визуального стиля:**
| Вариант | Применение | Базовые классы |
|---------|-----------|----------------|
| `primary` | Главные действия | `bg-accent text-accent-foreground` |
| `filled` | Второстепенные | `bg-zinc-900/10 dark:bg-white/10` |
| `outline` | Отмена/нейтральные | `border border-zinc-300 bg-white` |
| `ghost` | Иконки/тулбар | `bg-transparent hover:bg-zinc-100` |
| `danger` | Деструктивные | `bg-red-500 text-white` |
| `subtle` | Текстовые ссылки | `text-zinc-500 hover:text-zinc-900` |

### 4.2. Обработка групп

**Паттерн «Группы без явной конфигурации»:**

```css
/* Автоматическая обработка границ в группах */
[data-group] > [data-group-target]:not(:first-child) {
    border-start-start-radius: 0;
    border-end-start-radius: 0;
}

/* Специфичные варианты границ */
[data-group] > [data-variant="outline"]:not(:first-child) {
    border-left-color: transparent;
}

[data-group] > [data-variant="filled"]:not(:last-child) {
    border-right-color: transparent;
}
```

## 5. Интеграция с фреймворками

### 5.1. Livewire-интеграция

**События компонентов:**
```php
trait InteractsWithLibrary
{
    // Модальные окна
    public function modalShow(string $name, array $params = []): void
    {
        $this->dispatch('modal-show', name: $name, ...$params);
    }

    public function modalClose(string $name): void
    {
        $this->dispatch('modal-close', name: $name);
    }

    // Toast-уведомления
    public function toast(string $message, string $type = 'info'): void
    {
        $this->dispatch('toast-show', message: $message, type: $type);
    }
}
```

**Макросы для удобства:**
```php
// В сервис-провайдере
Component::macro('modal', fn(string $name) => $this->dispatch('modal-show', name: $name));
Component::macro('toast', fn(string $message) => $this->dispatch('toast-show', message: $message));
```

### 5.2. Alpine.js интеграция

**Директивы:**
```javascript
// Автоматическое управление фокусом
directive('autofocus', (el) => {
    el.focus();
});

// Управление горячими клавишами
directive('hotkey', (el, { expression }) => {
    // Реализация kbd-поддержки
});
```

## 6. Расширяемость

### 6.1. Публикация компонентов

**Команда Artisan:**
```php
class PublishCommand extends Command
{
    protected $signature = 'lib:publish {component?}';

    public function handle(): void
    {
        $component = $this->argument('component');

        if (!$component) {
            $component = $this->selectComponent();
        }

        $this->publishComponent($component);
        $this->info("Component published to resources/views/components/{$component}");
    }

    private function selectComponent(): string
    {
        return $this->anticipate(
            'Which component?',
            $this->getAvailableComponents()
        );
    }
}
```

### 6.2. Кастомные варианты

**Регистрация нового варианта:**
```php
// В сервис-провайдере или конфиге
ComponentManager::getInstance()
    ->registerVariant('button', 'gradient', [
        'classes' => 'bg-gradient-to-r from-blue-500 to-purple-500',
        'allowed_sizes' => ['base', 'sm'],
    ]);
```

## 7. Best Practices

### 7.1. Применение к своим компонентам

1. **Начинайте с минимального API**
   ```php
   // Плохо: 10 параметров
   <x-button variant="primary" size="base" :loading="true" icon="plus" icon-position="left" ... />

   // Хорошо: интуитивные умолчания
   <x-button icon="plus">Add</x-button>
   ```

2. **Используйте атрибуты для редких случаев**
   ```php
   // Стандартное использование — параметры
   <x-button variant="ghost">Cancel</x-button>

   // Специальные случаи — атрибуты
   <x-button data-custom-behavior>Special</x-button>
   ```

3. **Делегируйте сложную логику менеджеру**
   ```php
   // В шаблоне
   @php
   $classes = app(ComponentManager::class)
       ->resolveButtonClasses($variant, $size, $square);
   @endphp
   ```

4. **Поддерживайте обе среды — Livewire и чистый Blade**
   ```php
   // Работает и с wire:click, и с @click
   <x-button wire:click="save">Save</x-button>
   <x-button @click="open = true">Open</x-button>
   ```

### 7.2. Чек-лист проектирования компонента

- [ ] Поведение выводится из контекста?
- [ ] Есть ли fallback для всех автоопределяемых значений?
- [ ] Поддерживает ли Livewire loading states?
- [ ] Работает ли в группах без доп. конфигурации?
- [ ] Доступен ли через кастомные атрибуты синтаксис?
- [ ] Имеет ли семантически правильный DOM (button vs a)?

## 8. Заключение

Ключевые архитектурные решения Flux, применимые к любой UI-библиотеке:

1. **Минимальный API через контекст** — меньше параметров, больше интеллекта
2. **Fluent CSS-конструктор** — читаемая условная логика стилей
3. **Автоматическая интеграция** — Livewire работает «из коробки»
4. **Семантическая адаптивность** — один компонент для кнопок и ссылок
5. **Извлечение атрибутов** — чистый синтаксис для сложных случаев
6. **Групповая обработка CSS** — работа в группах без явной конфигурации
