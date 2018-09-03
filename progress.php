<?php
$total = 10;
system("rm svg/* png/*");
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
    $filename = "progress-$percent";
    error_log($filename);
    file_put_contents("svg/$filename.svg", ob_get_clean());
    system("svg2png svg/$filename.svg -o png/$filename.png");
}
