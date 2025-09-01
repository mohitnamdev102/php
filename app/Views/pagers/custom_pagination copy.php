<?php if ($pager) : ?>
    <div class="pagination">
        <!-- Previous -->
        <?php if ($pager->hasPrevious()) : ?>
            <button>
                <a href="<?= $pager->getPreviousPage() ?>">Previous</a>
            </button>
        <?php endif; ?>

        <!-- Current Page -->
        <button class="active">
            <?= $pager->getCurrentPage() ?>
        </button>

        <!-- Next -->
        <?php if ($pager->hasNext()) : ?>
            <button>
                <a href="<?= $pager->getNextPage() ?>">Next</a>
            </button>
        <?php endif; ?>
    </div>
<?php endif; ?>
