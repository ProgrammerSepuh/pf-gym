<style>
    .pagination {
        display:flex;
        justify-content: end;
    }
    .pagination li {
        list-style: none;
        width: 35px;
        padding: 5px 0px;
        margin: 5px;
    }
    .pagination a{
        color: black;
        text-decoration:none;
    }
    .active {
        background-color: #9AA6B2;
        border-radius: 5px;
    }
</style>

<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination">

    <?php foreach ($pager->links() as $link): ?>
        <li <?= $link['active'] ? 'class="active"' : '' ?>>
            <a href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li>
            <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.next') ?></span>
            </a>
        </li>
        <li>
            <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>