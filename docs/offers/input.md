# Предложение: Компонент Input

Компонент поля ввода Input, реализованный по аналогии с компонентом Button с учётом специфики полей ввода.

---

## 1. PHP класс: `chunker2i/base/src/View/Components/Input.php`

```php
<?php namespace Chunker2i\Base\View\Components;

class Input extends AbstractComponent
{
    public string $variant;
    public string $color;
    public string $size;
    public ?string $sizeScale;
    public ?string $sizeFont;
    public ?string $icon;
    public ?string $iconTrailing;
    public ?string $placeholder;
    public bool $disabled;
    public bool $readonly;
    public bool $required;
    public bool $autofocus;
    public ?string $type;
    public ?string $name;
    public ?string $value;
    public ?string $error;
    public bool $clearable;

    public function __construct(
        string $variant = 'outline',
        string $color = 'accent',
        string $size = 'md',
        ?string $sizeScale = null,
        ?string $sizeFont = null,
        ?string $icon = null,
        ?string $iconTrailing = null,
        ?string $placeholder = null,
        ?bool $disabled = null,
        ?bool $readonly = null,
        ?bool $required = null,
        ?bool $autofocus = null,
        ?string $type = 'text',
        ?string $name = null,
        ?string $value = null,
        ?string $error = null,
        ?bool $clearable = null
    ) {
        parent::__construct();

        $this->variant = $variant;
        $this->color = $color;
        $this->size = $size;
        $this->sizeScale = $sizeScale ?? $size;
        $this->sizeFont = $sizeFont ?? $size;
        $this->icon = $icon;
        $this->iconTrailing = $iconTrailing;
        $this->placeholder = $placeholder;
        $this->disabled = $disabled ?? false;
        $this->readonly = $readonly ?? false;
        $this->required = $required ?? false;
        $this->autofocus = $autofocus ?? false;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->error = $error;
        $this->clearable = $clearable ?? false;
    }

    public function render()
    {
        return view('chunker::components.input');
    }

    public function classes(): string
    {
        $builder = $this->classBuilder
            ->add('input')
            ->add("input_{$this->variant}");

        // Цветовой модификатор для ошибок или кастомного цвета
        if ($this->error || ($this->color !== 'accent' && $this->variant !== 'white')) {
            $color = $this->error ? 'danger' : $this->color;
            $builder->add("input_{$this->variant}-{$color}");
        }

        // Размеры отступов
        $builder->addMatch($this->sizeScale, [
            'sm' => 'input_sm',
            'md' => '',
            'lg' => 'input_lg',
        ]);

        // Размеры текста
        $builder->addMatch($this->sizeFont, [
            'sm' => 'text_sm',
            'md' => 'text',
            'lg' => 'text_lg',
        ]);

        // Состояния
        $builder
            ->addIf($this->disabled, 'input_disabled')
            ->addIf($this->readonly, 'input_readonly')
            ->addIf($this->error, 'input_error')
            ->addIf($this->hasIconLeft(), 'input_has-icon-left')
            ->addIf($this->hasIconRight(), 'input_has-icon-right');

        return $builder->toString();
    }

    protected function hasIconLeft(): bool
    {
        return filled($this->icon);
    }

    protected function hasIconRight(): bool
    {
        return filled($this->iconTrailing) || $this->clearable;
    }

    protected function iconVariant(): string
    {
        return match($this->size) {
            'sm' => 'micro',
            default => 'mini',
        };
    }
}
```

---

## 2. Blade шаблон: `chunker2i/base/resources/views/components/input.blade.php`

```blade
@php
    // Извлечение иконок из атрибутов
    $iconTrailing = $iconTrailing ?? $attributes->get('icon:trailing');
    $icon = $icon ?? $attributes->get('icon');
    
    // Определение состояния ошибки
    $hasError = $error || $attributes->get('error') || session()->has("errors.{$name}");
    
    // Определение необходимости clearable
    $isClearable = $clearable || $attributes->has('clearable');
    
    // Формирование ID для связи label и связанных элементов
    $inputId = $attributes->get('id') ?? 'input-' . uniqid();
    
    // Удаление служебных атрибутов
    $attributes = $attributes->except(['icon', 'icon:trailing', 'error', 'clearable']);
@endphp

<div {{ $attributes->only(['class'])->merge(['class' => 'input-wrapper']) }}>
    @if(isset($label) && !$label->isEmpty())
        <label for="{{ $inputId }}" class="input__label">
            {{ $label }}
            @if($required)
                <span class="input__required">*</span>
            @endif
        </label>
    @endif

    <div class="input__container {{ $hasError ? 'input__container_error' : '' }}">
        @if($icon)
            <x-chunker::icon 
                name="{{ $icon }}" 
                size="{{ $iconVariant() }}" 
                class="input__icon input__icon_left" 
            />
        @endif

        <input
            type="{{ $type }}"
            id="{{ $inputId }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $autofocus ? 'autofocus' : '' }}
            {{ $attributes->except(['class'])->merge(['class' => $classes()]) }}
        />

        @if($iconTrailing && !$isClearable)
            <x-chunker::icon 
                name="{{ $iconTrailing }}" 
                size="{{ $iconVariant() }}" 
                class="input__icon input__icon_right" 
            />
        @endif

        @if($isClearable && !$disabled && !$readonly)
            <button 
                type="button" 
                class="input__clear" 
                onclick="this.previousElementSibling.value = ''; this.previousElementSibling.focus();"
                aria-label="Очистить поле"
            >
                <x-chunker::icon name="x-mark" size="micro" />
            </button>
        @endif
    </div>

    @if($hasError)
        <span class="input__error">
            {{ $error ?? session("errors.{$name}.0") }}
        </span>
    @endif

    @if(isset($hint) && !$hint->isEmpty())
        <span class="input__hint">{{ $hint }}</span>
    @endif
</div>
```

---

## 3. SCSS стили: `chunker2i/base/resources/scss/ui/base/_input.scss`

```scss
@use "@core/tokens" as token;

// Миксин для outline варианта (основной)
@mixin input-outline($color, $text: null) {
    $_text: token.color-base($color);
    $_bg: token.color-base(token.$content-light);
    $_border: token.color-base($color, .3);
    $_border-focus: token.color-base($color);
    $_placeholder: token.color-base(token.$gray);

    background-color: $_bg;
    color: $_text;
    border: token.scale(1) solid $_border;

    &::placeholder {
        color: $_placeholder;
    }

    &:hover:not(:disabled):not([readonly]) {
        border-color: token.color-light-10($color);
    }

    &:focus {
        outline: none;
        border-color: $_border-focus;
        box-shadow: 0 0 0 token.scale(2) token.color-base($color, .15);
    }

    &:disabled,
    &[readonly] {
        background-color: token.color-light-50(token.$gray);
        color: token.color-dark-20(token.$gray);
        cursor: not-allowed;
    }
}

// Миксин для filled варианта
@mixin input-filled($color, $text: null) {
    $_text: token.color-base($color);
    $_bg: token.color-base($color, .08);
    $_border: transparent;
    $_border-focus: token.color-base($color);

    background-color: $_bg;
    color: $_text;
    border: token.scale(1) solid $_border;

    &:hover:not(:disabled):not([readonly]) {
        background-color: token.color-base($color, .12);
    }

    &:focus {
        outline: none;
        background-color: token.color-base(token.$content-light);
        border-color: $_border-focus;
        box-shadow: 0 0 0 token.scale(2) token.color-base($color, .15);
    }

    &:disabled,
    &[readonly] {
        opacity: 0.6;
        cursor: not-allowed;
    }
}

// Базовые стили
.input-wrapper {
    display: flex;
    flex-direction: column;
    gap: token.scale(token.$scale-4);
    width: 100%;
}

.input__label {
    font-size: token.scale(token.$scale-12);
    color: token.color-base(token.$content-dark);
    font-weight: token.weight-medium();

    .input__required {
        color: token.color-base(token.$danger);
        margin-left: token.scale(token.$scale-2);
    }
}

.input__container {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;

    &_error {
        .input {
            border-color: token.color-base(token.$danger);
            
            &:focus {
                box-shadow: 0 0 0 token.scale(2) token.color-base(token.$danger, .15);
            }
        }
    }
}

.input {
    width: 100%;
    border-radius: token.scale(token.$scale-80);
    transition: border-color .2s ease, box-shadow .2s ease, background-color .2s ease;
    font-family: inherit;

    padding: token.scale(token.$scale-8) token.scale(token.$scale-12);

    &_sm {
        padding: token.scale(token.$scale-4) token.scale(token.$scale-8);
    }

    &_lg {
        padding: token.scale(token.$scale-12) token.scale(token.$scale-16);
    }

    &.input_has-icon-left {
        padding-left: token.scale(token.$scale-32);
    }

    &.input_has-icon-right {
        padding-right: token.scale(token.$scale-32);
    }

    &_outline {
        @include input-outline(token.$accent);
    }

    &_outline-success {
        @include input-outline(token.$success);
    }

    &_outline-danger {
        @include input-outline(token.$danger);
    }

    &_filled {
        @include input-filled(token.$accent);
    }

    &_filled-success {
        @include input-filled(token.$success);
    }

    &_filled-danger {
        @include input-filled(token.$danger);
    }
}

.input__icon {
    position: absolute;
    color: token.color-base(token.$gray);
    pointer-events: none;

    &_left {
        left: token.scale(token.$scale-12);
    }

    &_right {
        right: token.scale(token.$scale-12);
    }
}

.input__clear {
    position: absolute;
    right: token.scale(token.$scale-8);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: token.scale(token.$scale-4);
    border: none;
    background: transparent;
    color: token.color-base(token.$gray);
    cursor: pointer;
    border-radius: token.scale(token.$scale-40);
    transition: color .2s ease, background-color .2s ease;

    &:hover {
        color: token.color-base(token.$content-dark);
        background-color: token.color-base(token.$gray, .1);
    }
}

.input__error {
    font-size: token.scale(token.$scale-12);
    color: token.color-base(token.$danger);
}

.input__hint {
    font-size: token.scale(token.$scale-12);
    color: token.color-base(token.$gray);
}
```

---

## 4. Регистрация в `ui/_index.scss`

```scss
@use "utils/spinner";
@use "base/link";
@use "base/button";
@use "base/input";  // <-- добавить
@use "utils/icon";
```

---

## Ключевые особенности Input vs Button

| Особенность | Button | Input |
|-------------|--------|-------|
| **Базовый элемент** | `<button>` или `<a>` | `<input>` внутри wrapper |
| **Состояния** | `loading`, `disabled` | `disabled`, `readonly`, `required`, `error` |
| **Иконки** | Слева/справа внутри кнопки | Абсолютное позиционирование внутри контейнера |
| **Валидация** | Нет | Интеграция с ошибками Laravel/Session |
| **Лейбл** | Через `$slot` или `text` | Отдельный `$label` slot |
| **Clearable** | Нет | Кнопка очистки для типов text/search |
| **Типы** | semantic (button/link) | HTML input types (text, email, password...) |

---

## Примеры использования

```blade
{{-- Базовое использование --}}
<x-chunker::input name="email" type="email" placeholder="Введите email" />

{{-- С лейблом --}}
<x-chunker::input name="name" label="Имя" required />

{{-- С иконкой --}}
<x-chunker::input name="search" icon="magnifying-glass" placeholder="Поиск..." />

{{-- С ошибкой --}}
<x-chunker::input name="email" :error="$errors->first('email')" />

{{-- Clearable поле --}}
<x-chunker::input name="query" clearable icon="magnifying-glass" />

{{-- Размеры --}}
<x-chunker::input size="sm" placeholder="Small" />
<x-chunker::input size="lg" placeholder="Large" />
```
