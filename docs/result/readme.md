# Компоненты Chunker

## Icon

Компонент для отображения SVG-иконок. Поддерживает два режима: через спрайт (обычные иконки) и inline SVG (цветные иконки).

### Логика работы

Компонент автоматически определяет тип иконки:

1. **Цветные иконки** — если файл существует в `resources/icons-colored/{name}.svg`, компонент рендерит inline SVG с сохранением всех атрибутов и внутреннего содержимого из оригинального файла. Управление размером через CSS (атрибуты `width`/`height` удаляются).

2. **Обычные иконки** — если цветная не найдена, используется спрайт с тегом `<use>`, ссылающийся на символ с префиксом `icon-`. Иконки должны быть предварительно собраны в спрайт.

### Параметры

| Параметр | Тип | Обязательный | Описание |
|----------|-----|--------------|----------|
| `name` | `string` | Да | Имя иконки (имя файла без расширения `.svg`) |
| `size` | `?string` | Нет | Размер иконки: `sm`, `md` (по умолчанию), `lg` |
| `class` | `?string` | Нет | Дополнительные CSS-классы |

### Классы CSS

- `icon` — базовый класс компонента
- `size` — размер `md` (по умолчанию)
- `size_sm` — уменьшенный размер
- `size_lg` — увеличенный размер

### Примеры использования

```blade
{{-- Базовая иконка из спрайта --}}
<x-chunker::icon name="check" />

{{-- Цветная иконка (из icons-colored/) --}}
<x-chunker::icon name="map" />

{{-- Иконка с размером --}}
<x-chunker::icon name="check" size="lg" />

{{-- Иконка с дополнительными классами --}}
<x-chunker::icon name="check" class="text-green-500" />
```

---

## Button

Компонент кнопки с поддержкой иконок, состояния загрузки и Livewire-интеграции.

### Логика работы

Компонент рендерит кнопку с поддержкой:
- Иконки слева от текста (параметр `icon`)
- Состояния загрузки с индикатором спиннера
- Автоопределения квадратной формы (когда нет текста/слота)

**Цветовая логика**: цветовой модификатор `button_{variant}-{color}` добавляется только если `color !== 'accent'` **и** `variant !== 'white'`.

**Параметры размеров**: `sizeScale`, `sizeFont`, `sizeIcon` имеют fallback на параметр `size` для обратной совместимости. Классы шрифта добавляются только для неквадратных кнопок.

### Параметры

| Параметр | Тип | По умолчанию | Описание                                                                                                |
|----------|-----|--------------|---------------------------------------------------------------------------------------------------------|
| `variant` | `string` | `'primary'` | Вариант кнопки: `primary`, `white`, `outline`, `ghost`                                                  |
| `color` | `string` | `'accent'` | Цвет кнопки. Используется для формирования класса `button_{variant}-{color}` (кроме `accent` и `white`) |
| `size` | `string` | `'md'` | Базовый размер. Fallback для `sizeScale`, `sizeFont`, `sizeIcon`                                        |
| `sizeScale` | `?string` | `md` | Масштаб кнопки (`none`, `sm`, `md`, `lg`). Fallback на `size`                                           |
| `sizeFont` | `?string` | `md` | Размер шрифта (`sm`, `md`, `lg`). Fallback на `size`, не применяется к квадратным кнопкам               |
| `sizeIcon` | `?string` | `md` | Размер иконки (`sm`, `md`, `lg`). Fallback на `size`                                                                      |
| `icon` | `?string` | `null` | Имя иконки (слева от текста)                                                                            |
| `loading` | `bool` | `false` | Состояние загрузки. Добавляет индикатор и класс `button_loading`                                        |
| `square` | `bool` | `false` | Принудительная квадратная форма                                                                         |
| `weight` | `?string` | `'regular'` | Жирность текста: `regular`, `medium`, `semibold`, `bold`                                                |
| `text` | `?string` | `null` | Текст кнопки (альтернатива `$slot`)                                                                     |

### Динамические атрибуты

| Атрибут | Описание |
|---------|----------|
| `icon:trailing` | Имя иконки, отображаемой справа от текста (альтернатива параметру `icon`, который ставит иконку слева) |

### Классы CSS

- `button` — базовый класс
- `button_{variant}` — вариант кнопки
- `button_{variant}-{color}` — цветовой модификатор (если `color !== 'accent'` и `variant !== 'white'`)
- `spacing_square` — квадратная форма
- `spacing_none`, `spacing_sm`, `spacing`, `spacing_lg` — масштаб кнопки (зависит от `sizeScale`)
- `text_sm`, `text`, `text_lg` — размер шрифта (зависит от `sizeFont`, только для неквадратных)
- `weight`, `weight_medium`, `weight_semibold`, `weight_bold` — жирность текста (зависит от `weight`)
- `button_loading` — состояние загрузки

### Примеры использования

```blade
{{-- Базовая кнопка --}}
<x-chunker::button>Нажми меня</x-chunker::button>

{{-- Кнопка с иконкой слева --}}
<x-chunker::button icon="check">Сохранить</x-chunker::button>

{{-- Кнопка с иконкой справа (trailing) --}}
<x-chunker::button icon:trailing="arrow-right">Далее</x-chunker::button>

{{-- Кнопка-ссылка (через атрибут href) --}}
<x-chunker::button href="/profile">Профиль</x-chunker::button>

{{-- Кнопка outline с цветом (добавит класс button_outline-red) --}}
<x-chunker::button variant="outline" color="red">Удалить</x-chunker::button>

{{-- Кнопка primary с цветом accent (не добавит цветовой модификатор) --}}
<x-chunker::button variant="primary" color="accent">Сохранить</x-chunker::button>

{{-- Кнопка с состоянием загрузки --}}
<x-chunker::button loading>Загрузка...</x-chunker::button>

{{-- Квадратная кнопка с иконкой (без текста) --}}
<x-chunker::button icon="close" square />

{{-- Кнопка с текстом через параметр (вместо слота) --}}
<x-chunker::button text="Отмена" variant="ghost" />

{{-- Кнопка с увеличенным масштабом --}}
<x-chunker::button size="lg">Большая кнопка</x-chunker::button>

{{-- Кнопка с гранулярным контролем размеров --}}
<x-chunker::button sizeScale="lg" sizeFont="sm">Большая кнопка, маленький текст</x-chunker::button>

{{-- Кнопка без отступов (только для кастомных случаев) --}}
<x-chunker::button sizeScale="none">Компактная</x-chunker::button>

{{-- Кнопка с полужирным текстом --}}
<x-chunker::button weight="semibold">Важно</x-chunker::button>
```
