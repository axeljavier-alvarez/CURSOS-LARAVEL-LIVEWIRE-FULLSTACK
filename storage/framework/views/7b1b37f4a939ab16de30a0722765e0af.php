<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['course']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['course']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php

    $links = [

    [
        'name'=>'Información del curso',
        'url'=> route('instructor.courses.edit', $course),
        'active'=> request()->routeIs('instructor.courses.edit')
    ],
     [
        'name'=>'Video promocional',
        'url'=> route('instructor.courses.video', $course),
        'active'=> request()->routeIs('instructor.courses.video')
    ],

     [
        'name'=>'Metas del curso',
        'url'=> route('instructor.courses.goals', $course),
        'active'=> request()->routeIs('instructor.courses.goals')
    ],

    [
        'name' => 'Requisitos del curso', 
        'url'=> route('instructor.courses.requirements', $course),
        'active'=> request()->routeIs('instructor.courses.requirements')

],

 [
        'name' => 'Curriculum', 
        'url'=> route('instructor.courses.curriculum', $course),
        'active'=> request()->routeIs('instructor.courses.curriculum')

],







];
?>


 <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'py-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'py-8']); ?>

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

<div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

        <aside class="col-span-1">

            <h1 class="font-semibold text-xl mb-4">
                Edición del curso
            </h1>
            <nav>
                <ul class="space-y-2">
                   <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <li class="border-l-4 <?php echo e($link['active'] ? 'border-indigo-400' : 'border-transparent'); ?> border-indigo-400 pl-3">
                        <a href="<?php echo e($link['url']); ?>">
                            <?php echo e($link['name']); ?>

                        </a>
                      </li>

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </nav>
        </aside>

        <div class="col-span-1 lg:col-span-4">
            <div class="card">


                <?php echo e($slot); ?>





            </div>
        </div>
<?php /**PATH C:\laragon\www\codersfree\resources\views/components/instructor/course-sidebar.blade.php ENDPATH**/ ?>