<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Berita</h1>
    <a href="<?php echo e(route('berita.create')); ?>" class="btn btn-primary mb-3">Tambah Berita</a>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $beritas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($berita->judul); ?></td>
                <td><?php echo e($berita->kategori->nama ?? '-'); ?></td>
                <td><?php echo e($berita->status); ?></td>
                <td><?php echo e($berita->user->name ?? '-'); ?></td>
                <td>
    <a href="<?php echo e(route('berita.show', $berita)); ?>" class="btn btn-info btn-sm">Lihat</a>
    <a href="<?php echo e(route('berita.edit', $berita)); ?>" class="btn btn-warning btn-sm">Edit</a>
    <form action="<?php echo e(route('berita.destroy', $berita)); ?>" method="POST" style="display:inline;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
    </form>
    <?php if(auth()->user()->role === 'editor' && $berita->status === 'draft'): ?>
        <form action="<?php echo e(route('berita.approve', $berita)); ?>" method="POST" style="display:inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Approve berita ini?')">Approve</button>
        </form>
    <?php endif; ?>
</td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\starter-laravel-news\resources\views/berita/index.blade.php ENDPATH**/ ?>