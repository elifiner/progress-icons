<?php
$total = 10;
system("rm svg/* png/* 2> /dev/null");
for ($count = 0; $count <= $total; $count += 1) {
    ob_start();
    ?>
    <svg height="64" width="64">
        <g transform="translate(5 12) rotate(-16 11 11)">
            <?php for ($i = 0; $i <= $total; $i += 1): ?>
                <circle cx="24" cy="0" r="7" stroke="gray" stroke-width="1" fill="<?= $i <= $count ? 'green' : 'white'?>" transform="rotate(<?=$i * 360/$total?> 24 24)" />
            <?php endfor; ?>
        </g>
        <!-- <rect width="100%" height="100%" stroke="black" fill="none"> -->
    </svg>
    <?php
    $percent = $count / $total * 100;
    $filename = "progress-$percent";
    error_log($filename);
    file_put_contents("svg/$filename.svg", ob_get_clean());
    system("svg2png svg/$filename.svg -o png/$filename.png");
}
