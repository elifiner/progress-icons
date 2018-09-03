<?php
$total = 10;
for ($count = 0; $count <= $total; $count += 1) {
    ob_start();
    ?>
    <svg height="32" width="32">
        <g transform="translate(5 5) rotate(-16 11 11)">
            <?php for ($i = 0; $i <= $total; $i += 1): ?>
                <circle cx="11" cy="0" r="3" stroke="gray" stroke-width="0.5" fill="<?= $i <= $count ? 'green' : 'white'?>" transform="rotate(<?=$i * 360/$total?> 11 11)" />
            <?php endfor; ?>
        </g>
    </svg>
    <?php
    $percent = $count / $total * 100;
    file_put_contents("progress-$percent.html", ob_get_clean());
}
