<?php

namespace Jllopezv\LivewireDropdown;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class LivewireDropdown extends Component
{
    public $name;
    public $theme;
    public $options;

    public $showSelectionBox = false;
    public $showOnTop = false;
    public $showCaret = true;

    public $selectedDefaultValue;
    public $selectedContent = '';
    public $selectedKey = null;
    public $selectedValue = null;

    public $selectedCanBeNull = true;

    public $defaultValue = '';

    protected function getListeners()
    {
        return [
            "$this->name.setValue"  =>  'setValue',
            "$this->name.updated"   =>  'dropdownUpdated'
        ];
    }

    public function mount($name)
    {
        $this->name = $name;

        $this->selectedDefaultValue = trans('liveview-dropdown::messages.select_an_option');
        $this->selectedContent = $this->selectedDefaultValue;
        $this->theme = $this->theme();

        $this->options = $this->setOptions();
        if ( $this->selectedCanBeNull ) $this->options->prepend([
            'value' => null,
            'text'  => $this->selectedDefaultValue
        ]);

        if ( $this->defaultValue ) {
            $search = $this->defaultValue;
            $this->selectOption($this->options->search(function($item) use($search) {
                return $item['value'] === $search;
            }), false);
        }
    }

    public function template($key)
    {
        // Can return a rendered view
        return $this->selectedContent = $this->options[$key]['text'];
    }

    public function theme()
    {
        return [
            'containerClass'    =>  'p-1',

            'labelText'         =>  'text-gray-700 font-bold',
            'labelClass'        =>  'w-80 text-right pr-1',

            'selectContainer'           =>  'apparence-none border-b border-gray-300 hover:border-gray-400 w-80',
            'selectText'                =>  'p-1 text-gray-700 hover:text-gray-800',
            'selectContainerCaret'      =>  'text-gray-500 hover:text-gray-600',
            'selectCaret'               =>  '',

            'optionsBoxContainer'     =>  'border border-gray-300 p-1 bg-gray-100 w-full',
            'optionsBoxHeight'        =>  'max-h-40',
            'optionsBoxWidth'         =>  'w-full',
            'optionsBoxItem'          =>  'p-1 bg-gray-100 text-gray-600 hover:text-white hover:bg-gray-800',
            'optionsBoxSelectedItem'  =>  'p-1 bg-gray-800 text-green-300',
            'optionsBoxTopClass'      =>  '',
            'optionsBoxBottomClass'   =>  'bottom-7',
        ];
    }

    public function setOptions()
    {
        return collect();
    }

    public function toggleSelectionBox()
    {
        $this->showSelectionBox = !$this->showSelectionBox;
    }

    public function hideSelectionBox()
    {
        $this->showSelectionBox = false;
    }

    public function selectOption($key, $sendNotification = true)
    {
        $this->selectedKey = $key;
        $this->selectedValue = $this->options[$key]['value'];
        $this->selectedOption = $this->options[$key];
        $this->selectedContent = $this->template($key);

        if ( $sendNotification ) $this->sendNotification();
    }

    public function sendNotification()
    {
        $this->emit("$this->name.updated", $this->selectedOption);
    }

    /**
     * Events
     */

    public function dropdownUpdated($item)
    {
    }

    public function setValue($value, $sendNotification = true)
    {
        $key = collect($this->options)->search(function($item) use($value) {
            return $item['value'] === $value;
        });

        $this->selectOption($key, $sendNotification);

    }

    /**
     * Render
     */

    public function render()
    {
        return view('jllopezv.livewire-dropdown.livewire-dropdown'); // Production
    }
}
