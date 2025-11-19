<div>

    <?php $__env->startPush('css'); ?>

    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css" />

    <?php $__env->stopPush(); ?>

    <h1 class="text-2xl font-semibold">Video promocional</h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">

        <div class="col-span-1">

            <!--[if BLOCK]><![endif]--><?php if($course->video_path): ?>

            <div wire:ignore>
 <div x-data x-init="
            let player = new Plyr($refs.player);
            ">

            <!-- -->
 <video x-ref="player" class="aspect-video" playsinline controls data-poster="<?php echo e($course->image); ?>">
                    <source src="<?php echo e(Storage::url($course->video_path)); ?>">
                </video>
            </div>




            </div>




            <?php else: ?>
                <div x-data x-init="new Plyr($refs.player)">
                    <video x-ref="player" class="aspect-video" controls playsinline>
                        <source src="<?php echo e(asset('storage/courses/promotional-videos/course_video.mp4')); ?>" type="video/mp4">
                    </video>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

          

        </div>


        <div class="col-span-1">

            <form wire:submit="save">

                <?php if (isset($component)) { $__componentOriginalb24df6adf99a77ed35057e476f61e153 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb24df6adf99a77ed35057e476f61e153 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation-errors','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $attributes = $__attributesOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__attributesOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb24df6adf99a77ed35057e476f61e153)): ?>
<?php $component = $__componentOriginalb24df6adf99a77ed35057e476f61e153; ?>
<?php unset($__componentOriginalb24df6adf99a77ed35057e476f61e153); ?>
<?php endif; ?>

                <p class="mb-4">
                    Lorem ipsum dolor sit amet, consectetur.
                </p>

                <?php if (isset($component)) { $__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.progress-indicators','data' => ['wire:model' => 'video']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('progress-indicators'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'video']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9)): ?>
<?php $attributes = $__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9; ?>
<?php unset($__attributesOriginal8a2d84abbcfd50c549f3c043d4c4f9c9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9)): ?>
<?php $component = $__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9; ?>
<?php unset($__componentOriginal8a2d84abbcfd50c549f3c043d4c4f9c9); ?>
<?php endif; ?>

                <div class="flex justify-end mt-4">
                    <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        Subir video
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                </div>

            </form>

        </div>

    </div>

    <?php $__env->startPush('js'); ?>
<script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
<script>
    const player = new Plyr('#player');

</script>
    <?php $__env->stopPush(); ?>
</div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/livewire/instructor/courses/promotional-video.blade.php ENDPATH**/ ?>