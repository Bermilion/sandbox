@props([
	'title' => null,
	'price' => null,
	'active' => false,
])

<div {{ $attributes->class([
    'price-card',
    'price-card_active' => $active,
]) }}>
	<x-type::h size="4" class="price-card__title">{{ $title }}</x-type::h>
	<x-type::hero class="price-card__price">{{ $price }} р</x-type::hero>
	<x-type::hint>Доступ на 24 часа</x-type::hint>
	<x-base::button text="Купить" icon:trailing="arrow-back-rounded" class="price-card__link" data-price="{{ $price }}" popovertarget="modal-form"/>
</div>
