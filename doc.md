# Chunker2i/Base - Документация пакета

## Обзор

`chunker2i/base` - это базовый пакет фреймворка Chunker, предоставляющий фундаментальную архитектуру для Laravel-приложений. Пакет включает систему SCSS-модулей, Blade-компоненты и PHP-утилиты для создания консистентного дизайна.

## Структура пакета

```
chunker2i/base/
├── composer.json                 # Конфигурация Composer-пакета
├── src/
│   ├── Providers/
│   │   └── AppServiceProvider.php  # Сервис-провайдер Laravel
│   └── Traits/
│       └── ModifiersTrait.php      # Трэйт для BEM-модификаторов
└── resources/
    ├── scss/                      # SCSS-модули
    └── views/                     # Blade-компоненты
```

---

## Архитектурные решения

### 1. PSR-4 Автозагрузка

Пакет использует стандарт PSR-4 для автозагрузки классов:

```json
{
  "autoload": {
    "psr-4": {
      "Chunker2i\\Base\\": "src/"
    }
  }
}
```

Пространство имен: `Chunker2i\Base\`

### 2. Сервис-провайдер Laravel

`AppServiceProvider` отвечает за:
- Публикацию SCSS-файлов в проект
- Регистрацию Blade-компонентов
- Управление путями к ресурсам

**Зона ответственности:** Интеграция пакета с Laravel-экосистемой

### 3. Система CSS-переменных

Все значения (цвета, масштабы, веса) преобразуются в CSS-переменные с автоматической генерацией:

```scss
color: var(--color-accent);
padding: var(--scale-16);
font-weight: var(--weight-bold);
```

**Преимущества:**
- Динамическое изменение темы
- Консистентность значений

### 4. OKLCH Цветовое пространство

Система цветов использует современное пространство OKLCH вместо HSL/RGB:

- Более точное восприятие цветов человеком
- Лучшая поддержка градиентов
- Консистентная яркость между оттенками

**Функции цветов:**
- `base($color)` - базовый цвет (оттенок 500)
- `light-10($color)` ... `light-50($color)` - светлые оттенки
- `dark-10($color)` ... `dark-50($color)` - темные оттенки
- `content($color)` - контрастный цвет для текста

### 5. Адаптивная система шрифтов с clamp()

Гибридная система масштабирования, сочетающая:
- Математическую точность viewport-based расчетов
- Контролируемый рост через CSS `clamp()`

**Диапазоны viewport:**
- phone-portrait: 360px-767px (8px → 9px)
- phone-landscape: 800px-1023px (8px → 10px)
- tablet-portrait: 768px-1023px (8px → 10px)
- tablet-landscape: 1024px-1279px (8px → 11px)
- laptop: 1280px-1599px (8px → 11px)
- wide: 1600px+ (8px → 12px)

### 6. BEM-подобная система модификаторов

`ModifiersTrait` предоставляет утилиту для построения CSS-классов с модификаторами:

```php
$class = $modifierHelper->buildModifiersClass('link', 'menu dark');
// Результат: 'link link_menu link_dark'
```

**Принципы:**
- Базовый класс: `component`
- Модификаторы: `component_modifier`
- Разделитель: `_`

### 7. Tailwind-подобная палитра цветов

Полная палитра Tailwind CSS (50-950 оттенки) для 24 цветовых схем:
- Основные: red, orange, yellow, green, blue, purple
- Нейтральные: slate, gray, zinc, neutral, stone
- Дополнительные: sky, indigo, violet, fuchsia, pink, rose
- Специальные: mauve, olive, mist, taupe

---

## SCSS-архитектура

### Структура директорий

```
resources/scss/
├── app.scss                    # Точка входа
├── core/                       # Базовые модули
│   ├── _colors.scss           # Система цветов (OKLCH)
│   ├── _viewports.scss        # Media-queries миксины
│   ├── _scale.scss            # Система масштабов
│   ├── _weight.scss           # Система весов шрифтов
│   ├── _tokens.scss           # Единый API функций
│   ├── _rem-clamp.scss        # Адаптивные шрифты
│   ├── _reset.scss            # CSS Reset
│   └── _variables.scss        # CSS переменные (генерация переменных из единого API функций)
├── config/                     # Конфигурация
│   ├── _colors.scss           # Базовые цвета проекта
│   ├── _scale.scss            # Базовые размеры (8px микромодуль) остальные значения заданы явно для удобства автокомплита в IDE
│   ├── _viewports.scss        # Границы viewport
│   └── _weight.scss           # Веса шрифтов
├── type/                       # Типографика
│   ├── _classes.scss          # Классы типографики
│   └── _index.scss            # Экспорт модуля
├── utils/                      # Утилиты
│   ├── classes/               # Утилитарные классы
│   │   ├── _margin.scss      # Margin классы
│   │   └── _padding.scss     # Padding классы
│   ├── mixins/                # Миксины
│   │   ├── _generate-css-variables.scss	# Миксин генерации CSS переменных из единого API функций
│   │   └── _generate-spacing-classes.scss 	# Миксин генерации утилитарных классов margin/padding
│   └── tailwind-colors/       # Палитра Tailwind
│       ├── _palette.scss		# Все цвета и оттенки палитры Tailwind в HEX формате
│       ├── _palette-map.scss	# Карта всех цветов и оттенков Tailwind в HEX формате (служебная информация для работы функций цвета)
│       ├── _hex-palette.scss	# Основные цвета палитры
│       ├── _oklch-palette.scss # Основные цвета палитры Tailwind в OKLCH формате
│       └── _interpolation-map.scss	# Карта интерполяции для получения оттенков
├── blocks/                     # Блоки
│   └── utils/
├── certain/                    # Специфические стили
│   ├── _body.scss
│   ├── _link.scss
│   └── _index.scss
└── components/                  # Компоненты
    └── _link.scss
```

### Основные модули

#### Core/_colors.scss

**Зона ответственности:** Управление цветовой системой

**Функционал:**
- Преобразование цветов в OKLCH пространство
- Генерация оттенков (light/dark)
- Автоматический контрастный цвет для текста
- Поиск ближайшего оттенка в палитре
- Генерация CSS-переменных цветов

**Ключевые функции:**
```scss
// CSS-переменные
base($color, $alpha: 1)
light-10($color, $alpha: 1) ... light-50($color, $alpha: 1)
dark-10($color, $alpha: 1) ... dark-50($color, $alpha: 1)
content($color, $alpha: 1)

// Сырые значения (без CSS-переменных)
base-value($color, $alpha: 1)
light-10-value($color, $alpha: 1) ...
dark-10-value($color, $alpha: 1) ...
content-value($color, $alpha: 1)
```

#### Core/_viewports.scss

**Зона ответственности:** Адаптивность и media-queries

**Миксины:**
```scss
// Ориентация
portrait { ... }
landscape { ... }

// Устройства
phone { ... }
phone-portrait { ... }
phone-landscape { ... }
tablet { ... }
tablet-portrait { ... }
tablet-landscape { ... }
mobile { ... }           // phone + tablet
laptop { ... }
wide { ... }
desktop { ... }          // laptop + wide
no-phone { ... }         // всё кроме phone
```

#### Core/_scale.scss

**Зона ответственности:** Система spacing и типографики

**Базовая единица:** 8px = 1rem

**Функции:**
```scss
// CSS-переменные
scale(8, 16)        // var(--scale-8) var(--scale-16)
scale(1rem, 2rem)   // var(--scale-8) var(--scale-16)

// Сырые значения
scale-value(8, 16)   // 1rem 2rem
scale-value(1rem, 2rem)  // 1rem 2rem
```

**Доступные значения:** -104, -96, -88, -80, -72, -64, -56, -48, -40, -32, -24, -20, -16, -12, -8, -4, -2, -1, 0, 1, 2, 4, 8, 12, 16, 20, 24, 32, 40, 48, 56, 64, 72, 80, 88, 96, 104, 240, 320, 800

#### Core/_weight.scss

**Зона ответственности:** Система весов шрифтов

**Функция:**
```scss
weight(400)    // var(--weight-regular)
weight(700)       // var(--weight-bold)
```

#### Core/_tokens.scss

**Зона ответственности:** Единый API для всех функций

**Экспортируемые функции:**
```scss
// Масштаб
scale($values...)
scale-value($values...)

// Цвета (CSS-переменные)
color-base($color, $alpha: 1)
color-light-10($color, $alpha: 1) ... color-light-50($color, $alpha: 1)
color-dark-10($color, $alpha: 1) ... color-dark-50($color, $alpha: 1)
color-content($color, $alpha: 1)

// Цвета (сырые значения)
color-base-value($color, $alpha: 1)
color-light-10-value($color, $alpha: 1) ...
color-dark-10-value($color, $alpha: 1) ...
color-content-value($color, $alpha: 1)

// Веса
weight($weight)
```

#### Type/_classes.scss

**Зона ответственности:** Типографические классы

**Классы:**
- `.h1` - `.h6` - Заголовки
- `.hero` - Герой-текст
- `.supheading` - Надзаголовок
- `.p` - Параграф
- `.hint` - Подсказка
- `.ul`, `.ol`, `.li` - Списки

**Модификаторы списков:**
- `.ul_circle`, `.ul_disc`, `.ul_square` - Маркеры
- `.ol_base` - Базовая нумерация
- `.ol_abc` - Алфавитная нумерация

---

## Blade-компоненты

### Структура

```
resources/views/
├── base/
│   └── components/
│       └── link.blade.php      # Ссылка
├── type/
│   └── components/
│       ├── h.blade.php         # Заголовок
│       ├── hero.blade.php      # Герой-текст
│       ├── hint.blade.php      # Подсказка
│       ├── li.blade.php        # Элемент списка
│       ├── ol.blade.php        # Нумерованный список
│       ├── p.blade.php         # Параграф
│       ├── supheading.blade.php # Надзаголовок
│       └── ul.blade.php        # Маркированный список
└── utils/
    └── components/
        └── icon.blade.php      # Иконка
```

### Base Components

#### x-base::link

**Зона ответственности:** Ссылки с модификаторами

**Параметры:**
- `mod` - модификаторы (по умолчанию: 'accent')
- `text` - текст ссылки
- `icon` - имя иконки
- `iconRight` - иконка справа (по умолчанию: false)

**Примеры:**
```blade
<x-base::link mod="accent hover" text="Ссылка" />
<x-base::link mod="accent" icon="arrow">Текст</x-base::link>
<x-base::link mod="accent" icon="arrow" iconRight="true">Текст</x-base::link>
```

### Type Components

#### x-type::h

**Зона ответственности:** Заголовки с динамическим уровнем

**Параметры:**
- `size` - размер (1-6, по умолчанию: 2)
- `mod` - модификаторы
- `text` - текст заголовка

**Примеры:**
```blade
<x-type::h size="1" mod="accent" text="Заголовок" />
<x-type::h size="2">Слот</x-type::h>
```

#### x-type::p

**Зона ответственности:** Параграфы с модификаторами

**Параметры:**
- `mod` - модификаторы

**Пример:**
```blade
<x-type::p mod="lead">Текст параграфа</x-type::p>
```

#### x-type::hero, x-type::hint, x-type::supheading

Аналогичная структура с параметром `mod`.

#### x-type::ul, x-type::ol, x-type::li

**Зона ответственности:** Списки

**Примеры:**
```blade
<x-type::ul mod="circle">
    <x-type::li>Элемент 1</x-type::li>
    <x-type::li>Элемент 2</x-type::li>
</x-type::ul>
```

### Utils Components

#### x-utils::icon

**Зона ответственности:** SVG-иконки

**Параметры:**
- `name` - имя иконки (обязательный)

**Пример:**
```blade
<x-utils::icon name="arrow" />
```

**Примечание:** Требует спрайт с иконками в HTML.

---

## PHP-трэйты

### ModifiersTrait

**Зона ответственности:** Генерация BEM-модификаторов

**Метод:**
```php
buildModifiersClass(string $baseClass, ?string $modifiers = null): string
```

**Пример:**
```php
$class = $modifierHelper->buildModifiersClass('link', 'menu dark');
// Результат: 'link link_menu link_dark'
```

**Использование в Blade:**
```blade
@php
use Chunker2i\Base\Traits\ModifiersTrait;

$modifierHelper = new class {
    use ModifiersTrait;
};

$class = $modifierHelper->buildModifiersClass('link', $mod);
@endphp
```

---

## Интеграция с Laravel

### Установка

1. Пакет устанавливается через Composer
2. Автоматически регистрируется через `extra.laravel.providers`

### Публикация ресурсов

```bash
php artisan vendor:publish --tag=resources
php artisan vendor:publish --tag=scss
```

**Публикуемые файлы:**
- `app.scss`
- `certain/_index.scss`
- `certain/_body.scss`
- `certain/_link.scss`
- `config/_colors.scss`
- `config/_scale.scss`
- `config/_viewports.scss`

### Загрузка view

Компоненты доступны через пространства имен:
- `base` - базовые компоненты
- `type` - типографика
- `utils` - утилиты

---

## Конфигурация

### Config/_colors.scss

Определение базовых цветов проекта:

```scss
$content: #f9f9f9;
$accent: #04f;
```

### Config/_scale.scss

Масштабная сетка (кратная 8px):

```scss
$scale-8: 1rem;     // 8px
$scale-16: 2rem;    // 16px
$scale-24: 3rem;    // 24px
// ...
```

### Config/_viewports.scss

Границы viewport:

```scss
$phone-portrait: ("standard": 360px);
$tablet-portrait: ("min": 768px, "standard": 768px);
$laptop: ("standard": 1366px, "max": 1599px);
$wide: ("standard": 1920px);
```

---

## Рекомендации по использованию

Прежде чем начать работу необходимо подключить общий API функций `@use "@core/tokens" as token`:
- `scale`
- `scale-value`
- `color-base`
- `color-base-value`
- `color-light-[10-50]`
- `color-light-[10-50]-value`
- `color-dark-[10-50]`
- `color-dark-[10-50]-value`
- `weight`
- Все переменные из конфигов.

### 1. Использование цветов

**В SCSS:**
```scss
.button {
  background-color: token.color-base(token.$accent);
  color: token.color-content(token.$accent);
  
  &:hover {
    background-color: token.color-dark-10(token.$accent);
  }
}
```

**В CSS (после компиляции):**
```css
.button {
  background-color: var(--color-accent);
  color: var(--color-content-accent);
}

.button:hover {
  background-color: var(--color-accent-dark-10);
}
```

### 2. Использование масштабов

**В SCSS:**
```scss
.container {
  padding: token.scale(16, 24);
  margin: token.scale(8, 0);
}
```

**В CSS:**
```css
.container {
  padding: var(--scale-16) var(--scale-24);
  margin: var(--scale-8) var(--scale-0);
}
```

### 3. Адаптивная типографика

```scss
@include viewports.phone {
  font-size: token.scale(16);
}

@include viewports.desktop {
  font-size: token.scale(20);
}
```

### 4. Создание компонентов

```blade
@props(['mod' => null])

@php
use Chunker2i\Base\Traits\ModifiersTrait;

$modifierHelper = new class {
    use ModifiersTrait;
};

$class = $modifierHelper->buildModifiersClass('my-component', $mod);
@endphp

<div {{ $attributes->class($class) }}>
    {{ $slot }}
</div>
```

---

## Генерация CSS-переменных

Пакет автоматически генерирует CSS-переменные для всех используемых значений. Глобальные карты отслеживают использованные переменные:

```scss
$variables-map-colors: ();    // Использованные цвета
$variables-map-scales: ();    // Использованные масштабы
$variables-map-weight: ();    // Использованные веса
```

Генерация происходит в `:root` через миксин `generate-css-variables`.

---

## Utility-классы

### Spacing классы

Генерируются через миксин `generate-spacing-classes`:

```scss
@include generate-spacing-classes('margin');
@include generate-spacing-classes('padding');
```

**Результат:**
```css
.m-8 { margin: var(--scale-8); }
.mt-8 { margin-top: var(--scale-8); }
.mx-8 { margin-left: var(--scale-8); margin-right: var(--scale-8); }
.p-16 { padding: var(--scale-16); }
// и т.д.
```

**Варианты с адаптивностью:**
```css
phone:m-8 { margin: var(--scale-8); }
tablet:p-16 { padding: var(--scale-16); }
// и т.д.
```

---

## Заключение

Пакет `chunker2i/base` предоставляет:
- **Консистентную дизайн-систему** через CSS-переменные
- **Современную цветовую систему** на OKLCH
- **Адаптивную типографику** с clamp()
- **BEM-модификаторы** для компонентного подхода
- **Tailwind-совместимую палитру** цветов
- **Готовые Blade-компоненты** для типографики и UI

**Зоны ответственности по модулям:**
- `core/` - базовая функциональность (цвета, масштабы, адаптив)
- `config/` - конфигурация проекта
- `type/` - типографика
- `utils/` - утилиты и генераторы
- `views/` - Blade-компоненты
- `src/` - PHP-интеграция с Laravel
