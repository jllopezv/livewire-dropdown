<div x-data="{}">
    <div class="relative {{ $theme['containerClass'] }} {{ $theme['selectContainerCaret'] }} w-full flex items-center justify-left">
        <div class="{{ $theme['labelClass'] }}">
            <label class="{{ $theme['labelText'] }}">LABEL</label>
        </div>
        <div class="relative cursor-pointer {{ $theme['selectContainer'] }}"
            wire:click='toggleSelectionBox'>
            <div class='absolute bottom-0 right-2 {{ $theme['selectCaret'] }}'>
                @if($showOnTop)
                    <i class='fa fa-angle-up'></i>
                @else
                    <i class='fa fa-angle-down'></i>
                @endif
            </div>
            <div class='{{ $theme['selectText'] }}'>{!! $selectedContent !!}</div>
            @if($showSelectionBox)
                <div
                    @click.away='$wire.hideSelectionBox()'
                    class='absolute left-0 {{ $showOnTop?$theme['optionsBoxBottomClass']:$theme['optionsBoxTopClass'] }} {{ $theme['optionsBoxWidth'] }} {{ $theme['optionsBoxContainer'] }}'>
                    <div class='overflow-y-auto {{ $theme['optionsBoxHeight'] }}'>
                        @foreach($options as $key=>$option)
                            <div
                                wire:click="selectOption({{ $key }})"
                                class='{{ $key==$selectedKey?$theme['optionsBoxSelectedItem']:$theme['optionsBoxItem'] }}'>
                                {{  $option['text'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
