<?php $__env->startSection('content'); ?>

    <?php echo $__env->make("includes.user_profile_nav", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row text-center cover-container-inner-sec">
        <h1 class="text-center">
            <?php echo e(Auth::user()->first_name); ?>'s Results
        </h1>
    </div>

    <div class="container" style="margin-bottom: 5rem; margin-top: 5rem;">
        <?php if(count($tests)>0): ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Description</th>
                    <th scope="col">Total Questions</th>
                    <th scope="col">Correct</th>
                    <th scope="col">Percentage</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Auth::user()->checkQuizTaken($test->id)==1): ?>
                    <tr>
                        <td><?php echo e($test->description); ?></td>
                        <td><?php echo e(count($test->questions)); ?></td>

                        <td><?php echo e(Auth::user()->checkMarks($test->id)); ?></td>
                        <td><?php echo e(((Auth::user()->checkMarks($test->id)/count($test->questions))*100)); ?>%</td>
                        <td>
                            <?php if(((Auth::user()->checkMarks($test->id)/count($test->questions))*100)<70): ?>
                                <a href="<?php echo e(route('giveTest', $test->id)); ?>" class="btn btn-primary btn-sm">Retake Test</a>
                                <?php endif; ?>
                        </td>





                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3>No Tests Found</h3>
        <?php endif; ?>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\linkliveducation2\resources\views/pages/user_results.blade.php ENDPATH**/ ?>