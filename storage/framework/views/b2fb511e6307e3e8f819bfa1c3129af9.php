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
            Curso: <?php echo e($course->title); ?>

        </h2>
     <?php $__env->endSlot(); ?>

   
            <?php if (isset($component)) { $__componentOriginal27ffdbad351dfa2def04bc9177485476 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ffdbad351dfa2def04bc9177485476 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.instructor.course-sidebar','data' => ['course' => $course]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('instructor.course-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['course' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($course)]); ?> 


                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('instructor.courses.promotional-video', ['course'=>$course]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1097004843-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ffdbad351dfa2def04bc9177485476)): ?>
<?php $attributes = $__attributesOriginal27ffdbad351dfa2def04bc9177485476; ?>
<?php unset($__attributesOriginal27ffdbad351dfa2def04bc9177485476); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ffdbad351dfa2def04bc9177485476)): ?>
<?php $component = $__componentOriginal27ffdbad351dfa2def04bc9177485476; ?>
<?php unset($__componentOriginal27ffdbad351dfa2def04bc9177485476); ?>
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
<?php /**PATH C:\laragon\www\codersfree\resources\views/instructor/courses/video.blade.php ENDPATH**/ ?>