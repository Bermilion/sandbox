<?php namespace App\Livewire;

use Livewire\Component;

class TestLoading extends Component
{
    public $status = 'idle';

    public function save()
    {
        $this->status = 'loading';
        sleep(2);
        $this->status = 'saved';
    }

    public function quickAction()
    {
        sleep(1);
    }

    public function render()
    {
        return <<<'BLADE'
<div class="wrapper wrapper_buttons">
    <p>Статус: {{ $status }}</p>

    {{-- Кнопка с автозагрузкой (loading=true + wire:click) --}}
    <x-chunker::button wire:click="save" loading icon="check">
        Сохранить (auto loading)
    </x-chunker::button>

    {{-- Кнопка с явным loading --}}
    <x-chunker::button wire:click="quickAction" loading>
        Быстрое действие
    </x-chunker::button>

    {{-- Кнопка без loading --}}
    <x-chunker::button wire:click="quickAction">
        Без индикатора
    </x-chunker::button>
</div>
BLADE;
    }
}
