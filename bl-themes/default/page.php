    <div class="container">
        <div class="content">
            <h1 class="page-title"><?php echo $page->title(); ?></h1>
            <div class="page-meta">
                <?php if ($page->date()): ?>
                    Published on <?php echo $page->date('F j, Y'); ?>
                    <?php if ($page->author()): ?>
                        by <?php echo $page->author(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="page-content">
                <?php echo $page->content(); ?>
            </div>
        </div>
    </div>
