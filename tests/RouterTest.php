<?php
require_once __DIR__ . '/test_runner.php';
require_once __DIR__ . '/../app/Helpers.php';

it('formats rupiah correctly and builds pre-filled whatsapp links', function () {
    assertEquals('Rp 185.000', Helpers::formatRupiah(185000));
    assertEquals('Rp 0', Helpers::formatRupiah(0));

    $waLink = Helpers::generateWaLink('Paket Seru 3', '25 orang');
    assertTrue(str_contains($waLink, 'https://wa.me/'), 'WA link must have correct prefix');
    assertTrue(str_contains($waLink, 'Paket%20Seru%203') || str_contains($waLink, 'Paket+Seru+3'), 'WA link must contain urlencoded package name');
});
