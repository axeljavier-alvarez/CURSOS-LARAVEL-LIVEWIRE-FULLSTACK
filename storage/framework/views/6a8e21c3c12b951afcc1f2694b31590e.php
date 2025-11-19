<div
    x-data="{ uploading: false, progress: 0 }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
>

    <input type="file" <?php echo e($attributes->whereStartsWith('wire:model')); ?>>

    <div x-show="uploading" class="mt-2">
        <progress max="100" x-bind:value="progress"></progress>
    </div>

</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/components/progress-indicators.blade.php ENDPATH**/ ?>