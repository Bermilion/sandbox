# Компоненты Chunker

## Icon

Компонент для отображения SVG-иконок через спрайт.

### Логика работы

Компонент рендерит SVG-элемент с использованием тега `<use>`, который ссылается на символ в SVG-спрайте. Иконки должны быть предварительно собраны в спрайт с префиксом `icon-`.

### Параметры

| Параметр | Тип | Обязательный | Описание |
|----------|-----|--------------|----------|
| `name` | `string` | Да | Имя иконки (идентификатор в спрайте без префикса `icon-`) |
| `size` | `?string` | Нет | Размер иконки. Добавляет класс `icon_size-{size}` |
| `class` | `?string` | Нет | Дополнительные CSS-классы |

### Классы CSS

- `icon` — базовый класс компонента
- `icon_size-{size}` — модификатор размера (формируется из параметра `size`)

### Примеры использования

```blade
{{-- Базовая иконка --}}
<x-chunker::icon name="check" />

{{-- Иконка с размером --}}
<x-chunker::icon name="check" size="lg" />

{{-- Иконка с дополнительными классами --}}
<x-chunker::icon name="check" class="text-green-500" />
```

### Шаблон

```blade
<svg {{ $attributes->merge(['class' => $classes()]) }}>
    <use xlink:href='#icon-{{ $name }}'></use>
</svg>
```

---

## Button

Компонент кнопки с поддержкой иконок, состояния загрузки и Livewire-интеграции.

### Логика работы

Компонент может рендерить либо `<button>`, либо `<a>` в зависимости от наличия атрибута `href`. Поддерживает:
- Иконки слева и справа от текста (параметр `icon` или атрибут `icon:trailing`)
- Состояние загрузки с индикатором спиннера
- Автоопределение квадратной формы (когда нет текста/слота)
- Livewire-интеграцию для состояния загрузки при `wire:click`

### Параметры

| Параметр | Тип | По умолчанию | Описание |
|----------|-----|--------------|----------|
| `variant` | `string` | `'primary'` | Вариант кнопки: `primary`, `white`, `outline`, `ghost` |
| `color` | `string` | `'accent'` | Цвет кнопки. Используется для формирования класса `button_{variant}-{color}` |
| `size` | `string` | `'base'` | Базовый размер. Используется как fallback для `sizeScale`, `sizeFont`, `sizeIcon` |
| `sizeScale` | `?string` | `null` | Масштаб кнопки. Fallback на `size` |
| `sizeFont` | `?string` | `null` | Размер шрифта. Fallback на `size` (только `'sm'` оставляет класс, иначе `null`) |
| `sizeIcon` | `?string` | `null` | Размер иконки. Fallback на `size` |
| `icon` | `?string` | `null` | Имя иконки |
| `loading` | `bool` | `false` | Состояние загрузки. Добавляет индикатор и классы `opacity-75 cursor-not-allowed` |
| `square` | `bool` | `false` | Принудительная квадратная форма. Автоотключается если есть `slot` или `text` |
| `weight` | `?string` | `'regular'` | Жирность текста: `regular`, `medium`, `semibold`, `bold` |
| `text` | `?string` | `null` | Текст кнопки (альтернатива `$slot`) |

### Атрибуты (в дополнение к параметрам)

| Атрибут | Описание |
|---------|----------|
| `icon:trailing` | Иконка справа от текста (альтернатива `icon`, который ставит иконку слева) |
| `wire:click` | Активирует Livewire-интеграцию для состояния загрузки |

### Классы CSS

- `button` — базовый класс
- `button_{variant}` — вариант кнопки
- `button_{variant}-{color}` — цветовой модификатор (не добавляется для цвета `accent` и варианта `white`)
- `button_square` — квадратная форма
- `button_sm`, `button_base`, `button_lg`, `button_size-none` — масштаб
- `button_font-sm` — уменьшенный шрифт
- `button_text-{weight}` — жирность текста (`regular`, `medium`, `semibold`, `bold`)
- `button_loading` — состояние загрузки
- `button__text` — обёртка для текста кнопки

### Примеры использования

```blade
{{-- Базовая кнопка --}}
<x-chunker::button>Нажми меня</x-chunker::button>

{{-- Кнопка с иконкой слева --}}
<x-chunker::button icon="check">Сохранить</x-chunker::button>

{{-- Кнопка с иконкой справа (trailing) --}}
<x-chunker::button icon:trailing="arrow-right">Далее</x-chunker::button>

{{-- Кнопка-ссылка --}}
<x-chunker::button href="/profile">Профиль</x-chunker::button>

{{-- Кнопка со своим вариантом и цветом --}}
<x-chunker::button variant="outline" color="red">Удалить</x-chunker::button>

{{-- Кнопка с состоянием загрузки --}}
<x-chunker::button loading>Загрузка...</x-chunker::button>

{{-- Квадратная кнопка с иконкой (без текста) --}}
<x-chunker::button icon="close" square />

{{-- Livewire кнопка с автозагрузкой --}}
<x-chunker::button wire:click="save">Сохранить</x-chunker::button>

{{-- Кнопка с текстом через параметр (вместо слота) --}}
<x-chunker::button text="Отмена" variant="ghost" />

{{-- Кнопка с кастомными размерами --}}
<x-chunker::button sizeScale="lg" sizeFont="sm" sizeIcon="base">Текст</x-chunker::button>
```

### Особенности шаблона

1. **Автоопределение иконки**: Иконка может быть задана через параметр `icon` или атрибут `icon:trailing` (ставит иконку справа)
2. **Автоопределение квадратной формы**: Кнопка автоматически становится квадратной если нет слота и нет параметра `text`
3. **Livewire интеграция**: При наличии `wire:click` и `loading=true` добавляются атрибуты `wire:loading.attr` и `wire:target`
4. **Состояние загрузки**: При `loading=true` добавляется спиннер-иконка с анимацией
