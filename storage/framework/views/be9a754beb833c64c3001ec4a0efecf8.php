<?php if (isset($component)) { $__componentOriginal0e13963cd964ea594eb49209b1b87de0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0e13963cd964ea594eb49209b1b87de0 = $attributes; } ?>
<?php $component = App\View\Components\InstructorLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('instructor-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\InstructorLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

 <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de cursos
        </h2>
 <?php $__env->endSlot(); ?>

<?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'mt-12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-12']); ?>
    <div class="md:flex md:justify-end mb-6">
    <a href="<?php echo e(route('instructor.courses.create')); ?>" class="btn btn-red block w-full md:w-auto text-center">
        Crear curso
    </a>
</div>
<ul>
    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="bg-white rounded-lg shadow-lg overflow-hidden">
        <a href="<?php echo e(route('instructor.courses.edit', $course)); ?>" class="md:flex">
            <figure class="flex-shrink-0 w-full md:w-32 aspect-video md:aspect-square">
    <img src="<?php echo e($course->image); ?>"
         class="w-full h-full object-cover object-center">
</figure>

        <div class="flex-1">

            <div class="py-4 px-8">
                <div class="grid md:grid-cols-9">
                <div class="md:col-span-3">
                    <h1 class="text-lg font-semibold">
                    <?php echo e($course->title); ?>

                    </h1>

                    <?php switch($course->status->name ):
                        case ('BORRADOR'): ?>
<span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">
    <?php echo e($course->status->name); ?>

</span>
                            <?php break; ?>
                        <?php case ('PENDIENTE'): ?>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-900 dark:text-yellow-300">
                            <?php echo e($course->status->name); ?>

                        </span>
                        <?php break; ?>

                        <?php case ('PUBLICADO'): ?>
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">
                            <?php echo e($course->status->name); ?>

                        </span>
                        <?php break; ?>

                        <?php default: ?>

                    <?php endswitch; ?>

                </div>

                <div class="hidden md:block col-span-2">
                    <p class="text-sm font-bold">
                        100 USD
                    </p>
                    <p class="mb-1 text-sm">
                        Ganado este mes
                    </p>
                    <p class="text-sm font-bold">
                        1000 USD
                    </p>
                    <p class="text-sm">
                        Ganado en total
                    </p>
                </div>


                <div class="hidden md:block col-span-2">
                    <p>
                        50
                    </p>
                    <p class="text-sm">
                        Inscripciones de este mes
                    </p>
                </div>

                <div class="hidden md:block col-span-2">
                    <div class="flex justify-end">
                        <p class="mr-3">5</p>

                        <ul class="text-xs space-x-1 flex items-center">
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>
                        <i class="fa-solid fa-star text-yellow-400"></i>

                        </ul>

                    </div>
                </div>
            </div>
            </div>

        </div>
        </a>
    </li>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <li class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center">
            <p>
                Salta a la creación de un curso
            </p>

            <a href="<?php echo e(route('instructor.courses.create')); ?>" class="btn btn-blue">
                Crea tu curso
            </a>
        </div>
    </li>

    <?php endif; ?>
</ul>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>



 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0e13963cd964ea594eb49209b1b87de0)): ?>
<?php $attributes = $__attributesOriginal0e13963cd964ea594eb49209b1b87de0; ?>
<?php unset($__attributesOriginal0e13963cd964ea594eb49209b1b87de0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0e13963cd964ea594eb49209b1b87de0)): ?>
<?php $component = $__componentOriginal0e13963cd964ea594eb49209b1b87de0; ?>
<?php unset($__componentOriginal0e13963cd964ea594eb49209b1b87de0); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\codersfree\resources\views/instructor/courses/index.blade.php ENDPATH**/ ?>