<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tambah Berita</h1>
    <form method="POST" action="<?php echo e(route('berita.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('berita.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\starter-laravel-news\resources\views/berita/create.blade.php ENDPATH**/ ?>