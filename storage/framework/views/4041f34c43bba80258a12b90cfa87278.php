<?php $__env->startSection('content'); ?>
<div class="container">
    <h1><?php echo e($berita->judul); ?></h1>
    <div class="mb-3">
        <strong>Kategori:</strong> <?php echo e($berita->kategori->nama ?? '-'); ?><br>
        <strong>Status:</strong> <?php echo e($berita->status); ?><br>
        <strong>Penulis:</strong> <?php echo e($berita->user->name ?? '-'); ?><br>
        <?php if($berita->gambar): ?>
            <img src="/<?php echo e($berita->gambar); ?>" alt="Gambar Berita" width="300" class="my-3">
        <?php endif; ?>
    </div>
    <div><?php echo nl2br(e($berita->isi)); ?></div>
    <a href="<?php echo e(route('berita.index')); ?>" class="btn btn-secondary mt-3">Kembali</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\starter-laravel-news\resources\views/berita/show.blade.php ENDPATH**/ ?>