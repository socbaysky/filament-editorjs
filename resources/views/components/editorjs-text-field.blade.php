<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    @if(is_null($getFileAttachmentUrl()))
        <div class="editorjs-wrapper w-full text-center text-gray-400 dark:text-gray-500">
            Save the record to start writing content.
        </div>
    @else
        <div class="filament-editorjs">
            <div
                wire:ignore
                {{
                  $attributes
                    ->merge($getExtraAttributes())
                    ->class([
                        'editorjs-wrapper'
                    ])
                }}
                x-data="editorjs({
                state: $wire.entangle('{{ $getStatePath() }}'),
                statePath: '{{ $getStatePath() }}',
                placeholder: '{{ $getPlaceholder() }}',
                readOnly: {{ $isDisabled() ? 'true' : 'false' }},
                imageUploadEndpoint: '{{ $getFileAttachmentUrl() }}',
                tools: @js($getTools()),
                minHeight: @js($getMinHeight())
            })"
            >
            </div>
        </div>
    @endif
</x-dynamic-component>
