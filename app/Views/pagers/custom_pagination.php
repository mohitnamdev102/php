<?php
$totalPages = $pager->getPageCount();
$currentPage = $pager->getCurrentPage();

?>

<div class="pagination">
    <!-- Previous Button -->
    <?php if ($currentPage > 1): ?>
        <a href="<?= $pager->getPreviousPageURI() ?>"><button>Previous</button></a>
    <?php else: ?>
        <button disabled>Previous</button>
    <?php endif; ?>

    <!-- Page Numbers -->
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="<?= $pager->getPageURI($i) ?>">
            <button class="<?= ($i == $currentPage) ? 'active' : '' ?>"><?= $i ?></button>
        </a>
    <?php endfor; ?>

    <!-- Page Info -->
    <span class="page-info">Page <?= $currentPage ?> of <?= $totalPages ?></span>

    <!-- Next Button -->
    <?php if ($currentPage < $totalPages): ?>
        <a href="<?= $pager->getNextPageURI() ?>"><button>Next</button></a>
    <?php else: ?>
        <button disabled>Next</button>
    <?php endif; ?>
</div>
