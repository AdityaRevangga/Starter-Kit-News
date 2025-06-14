<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Berita</h1>
    <form method="POST" action="<?php echo e(route('berita.update', $berita)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?php echo e($berita->judul); ?>" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required><?php echo e($berita->isi); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kategori->id); ?>" <?php echo e($berita->kategori_id == $kategori->id ? 'selected' : ''); ?>><?php echo e($kategori->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
            <?php if($berita->gambar): ?>
                <img src="/<?php echo e($berita->gambar); ?>" alt="Gambar" width="150" class="mt-2">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('berita.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\starter-laravel-news\resources\views/berita/edit.blade.php ENDPATH**/ ?>