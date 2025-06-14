<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tambah Kategori</h1>
    <form method="POST" action="<?php echo e(route('kategori.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\starter-laravel-news\resources\views/kategori/create.blade.php ENDPATH**/ ?>