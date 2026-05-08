# План разработки компонента Input

## Общее описание

Компонент Input — поле ввода текста с поддержкой иконок, валидации, состояний и различных вариантов оформления. Реализуется по архитектурным паттернам пакета `chunker2i/base`, аналогично компоненту Button.

---

## Архитектурные принципы

### 1. Структура компонента

| Уровень | Ответственность |
|---------|-----------------|
| **PHP класс** | Определение API (props), логика классов, валидация |
| **Blade шаблон** | Разметка, слоты, интеграция с Laravel/Session |
| **SCSS** | Визуальное оформление, состояния, анимации |

### 2. Конвенции именования

- Блок: `input`
- Элементы: `input__label`, `input__container`, `input__icon`
- Модификаторы: `input_outline`, `input_sm`, `input_error`

### 3. Паттерн props (аналогично Button)

| Prop | Тип | Default | Назначение |
|------|-----|---------|------------|
| `variant` | string | `outline` | Визуальный стиль: outline, filled |
| `color` | string | `accent` | Базовый цвет токена |
| `size` | string | `md` | Размер отступов и шрифта |
| `sizeScale` | ?string | `null` | Переопределение размера отступов |
| `sizeFont` | ?string | `null` | Переопределение размера шрифта |
| `icon` | ?string | `null` | Иконка слева |
| `iconTrailing` | ?string | `null` | Иконка справа |
| `placeholder` | ?string | `null` | Плейсхолдер |
| `disabled` | bool | `false` | Неактивное состояние |
| `readonly` | bool | `false` | Только для чтения |
| `required` | bool | `false` | Обязательное поле |
| `autofocus` | bool | `false` | Автофокус |
| `type` | ?string | `text` | HTML-тип поля |
| `name` | ?string | `null` | Имя поля (для форм) |
| `value` | ?string | `null` | Значение |
| `error` | ?string | `null` | Текст ошибки |
| `clearable` | ?bool | `false` | Кнопка очистки |

### 4. Слоты

| Слот | Назначение |
|------|------------|
| `$label` | Подпись поля с автоматической связью через `for` |
| `$hint` | Вспомогательный текст под полем |
| default | Не используется (input — self-closing) |

---

## Этапы разработки

### Этап 1: PHP класс компонента

**Файл:** `chunker2i/base/src/View/Components/Input.php`

**Задачи:**
1. Создать класс `Input extends AbstractComponent`
2. Определить публичные свойства с типами
3. Реализовать конструктор с дефолтными значениями
4. Реализовать метод `classes()` — генерацию CSS-классов через `ClassBuilder`
5. Реализовать вспомогательные методы: `hasIconLeft()`, `hasIconRight()`, `iconVariant()`

**Ключевые решения:**
- Использование `ClassBuilder` для консистентности с Button
- Автоопределение цвета ошибки (danger при `$error` или ошибках сессии)
- Поддержка независимых размеров `sizeScale`/`sizeFont` как в Button
- Иконки адаптируются под размер (micro для sm, mini для md/lg)

**Депенденси:**
- `AbstractComponent` — базовый класс
- `ComponentManager`, `ClassBuilder` — через DI

---

### Этап 2: Blade шаблон

**Файл:** `chunker2i/base/resources/views/components/input.blade.php`

**Задачи:**
1. Создать обертку `.input-wrapper` для flex-расположения label/input/hint
2. Реализовать условный рендеринг label с индикатором required
3. Создать контейнер `.input__container` для позиционирования иконок
4. Реализовать input с пробросом всех HTML-атрибутов
5. Добавить поддержку иконок (левая/правая) через `<x-chunker::icon>`
6. Реализовать кнопку очистки для `clearable` полей
7. Добавить отображение ошибок из props или сессии
8. Реализовать hint slot

**Ключевые решения:**
- Автогенерация ID для связи label-input если не указан
- Извлечение `icon`, `icon:trailing`, `error`, `clearable` из атрибутов в `@php` секции
- Интеграция с Laravel validation errors: `session("errors.{$name}.0")`
- Кнопка очистки — inline JS: `onclick="this.previousElementSibling.value = ''; this.previousElementSibling.focus();"`
- Атрибут `aria-label` для accessibility кнопки очистки

**Структура разметки:**
```
.input-wrapper
  ├── label.input__label (опционально)
  ├── .input__container
  │   ├── icon (left, опционально)
  │   ├── input
  │   ├── icon (right, опционально)
  │   └── clear button (опционально)
  ├── .input__error (опционально)
  └── .input__hint (опционально)
```

---

### Этап 3: SCSS стили

**Файл:** `chunker2i/base/resources/scss/ui/base/_input.scss`

**Задачи:**
1. Создать миксин `input-outline()` для outline варианта
2. Создать миксин `input-filled()` для filled варианта
3. Определить базовые стили обертки `.input-wrapper`
4. Стилизовать `.input__label` с поддержкой `.input__required`
5. Определить позиционирование `.input__container`
6. Стилизовать `.input` с вариантами и модификаторами
7. Добавить стили для иконок (абсолютное позиционирование)
8. Стилизовать кнопку очистки `.input__clear`
9. Добавить стили ошибок и hint

**Ключевые решения:**
- Outline вариант: белый фон, цветная рамка, токен-цветная тень при фокусе
- Filled вариант: полупрозрачный фон, без рамки, меняется при фокусе
- Состояния disabled/readonly: серый фон, уменьшенная непрозрачность
- Иконки позиционируются абсолютно внутри `.input__container`
- Отступы input адаптируются при наличии иконок (`input_has-icon-left/right`)
- Радиус скругления: `token.$scale-80` (консистентно с Button)
- Переходы: border-color, box-shadow, background-color по 0.2s

**Цветовые токены:**
- `token.$accent` — базовый цвет
- `token.$success`, `token.$danger` — варианты цвета
- `token.$gray` — плейсхолдер, иконки
- `token.$content-light`, `token.$content-dark` — фон/текст

---

### Этап 4: Регистрация в сборке

**Файл:** `chunker2i/base/resources/scss/ui/_index.scss`

**Изменение:**
```scss
@use "base/input";  // добавить после button
```

**Проверка:**
- Убедиться что Vite плагины корректно обрабатывают `@use "@core/tokens"`
- Проверить генерацию safelist для классов размеров

---

### Этап 5: Тестирование в песочнице

**Файл тестов:** `sandbox/resources/views/pages/dev.blade.php`

**Сценарии тестирования:**

| Сценарий | Проверка |
|----------|----------|
| Базовый input | Рендер, стили outline/accent |
| С лейблом | Связь label-input, required-индикатор |
| Размеры (sm, md, lg) | Пропорции, padding, шрифт |
| С иконками | Позиционирование, размеры иконок |
| Clearable | Появление кнопки, работа очистки |
| Состояния (disabled, readonly) | Визуальное оформление, поведение |
| Ошибки | Цвет рамки, сообщение, интеграция с сессией |
| Варианты (outline/filled) | Визуальные различия, hover/focus |
| Цвета (accent, success, danger) | Корректное применение токенов |

**Интеграция с Livewire:**
- Проверка `wire:model` синхронизации
- Поведение clearable с Livewire

---

## Сравнение с архитектурой Button

| Аспект | Button | Input |
|--------|--------|-------|
| **Базовый элемент** | `<button>` / `<a>` / `<div>` | `<input>` внутри wrapper |
| **Контейнер** | Нет (единый элемент) | `.input-wrapper` + `.input__container` |
| **Иконки** | Inline flex | Абсолютное позиционирование |
| **Состояния** | `loading`, `active` | `error`, `readonly`, `required` |
| **Валидация** | Нет | Интеграция с Laravel errors |
| **Слоты** | `$slot`, `text` prop | `$label`, `$hint` |
| **Clearable** | Нет | Кнопка очистки |
| **Размеры иконок** | `sizeIcon` prop | `iconVariant()` метод |

---

## Примеры использования (итоговый API)

```blade
{{-- Базовое использование --}}
<x-chunker::input name="email" type="email" placeholder="Введите email" />

{{-- С лейблом и обязательностью --}}
<x-chunker::input name="name" label="Имя" required />

{{-- С иконкой слева --}}
<x-chunker::input name="search" icon="magnifying-glass" placeholder="Поиск..." />

{{-- С ошибкой из валидации --}}
<x-chunker::input name="email" :error="$errors->first('email')" />

{{-- Clearable поле для поиска --}}
<x-chunker::input name="query" clearable icon="magnifying-glass" />

{{-- Размеры --}}
<x-chunker::input size="sm" placeholder="Small" />
<x-chunker::input size="lg" placeholder="Large" />

{{-- Варианты оформления --}}
<x-chunker::input variant="filled" color="success" />
<x-chunker::input variant="outline" color="danger" />

{{-- С хинтом --}}
<x-chunker::input name="password" type="password" label="Пароль">
    <x-slot:hint>Минимум 8 символов</x-slot:hint>
</x-chunker::input>

{{-- Livewire --}}
<x-chunker::input wire:model="search" clearable />
```

---

## Зависимости и требования

### От пакета base:
- `AbstractComponent` — наследование
- `ClassBuilder` — генерация классов
- `Icon` компонент — рендеринг иконок
- Токенизация SCSS (`@core/tokens`)

### От песочницы:
- Laravel Blade для тестирования
- Livewire (опционально) для проверки reactivity
- SCSS сборка через Vite

---

## Критерии завершения

- [ ] PHP класс Input реализован и наследует AbstractComponent
- [ ] Blade шаблон создает корректную HTML-структуру
- [ ] SCSS стили покрывают все варианты и состояния
- [ ] Компонент зарегистрирован в `ui/_index.scss`
- [ ] Все примеры использования работают в песочнице
- [ ] Интеграция с Laravel validation работает
- [ ] Clearable функционал работает корректно
