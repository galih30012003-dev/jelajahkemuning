<?php
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$db = Database::getInstance()->getConnection();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Auth::validateCsrf($_POST['csrf'] ?? '')) {
        $error = 'Validasi sesi (CSRF) gagal.';
    } else {
        $action = $_POST['action'] ?? '';
        if ($action === 'create' || $action === 'update') {
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $metaTitle = trim($_POST['meta_title']);
            $metaDesc = trim($_POST['meta_description']);
            $focusKw = trim($_POST['focus_keyword']);
            $status = $_POST['status'] ?? 'published';
            $ignoreId = ($action === 'update') ? (int)$_POST['id'] : null;

            // Generate unique slug
            $rawSlug = trim($_POST['slug'] ?? '') ?: $title;
            $slug = Helpers::generateUniqueSlug($db, 'articles', $rawSlug, $ignoreId);

            if ($action === 'create') {
                $stmt = $db->prepare("INSERT INTO articles (title, slug, content, meta_title, meta_description, focus_keyword, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$title, $slug, $content, $metaTitle, $metaDesc, $focusKw, $status]);
                $message = 'Artikel berhasil dipublikasikan!';
            } else {
                $id = (int)$_POST['id'];
                $stmt = $db->prepare("UPDATE articles SET title = ?, slug = ?, content = ?, meta_title = ?, meta_description = ?, focus_keyword = ?, status = ? WHERE id = ?");
                $stmt->execute([$title, $slug, $content, $metaTitle, $metaDesc, $focusKw, $status, $id]);
                $message = 'Artikel berhasil diperbarui!';
            }
        } elseif ($action === 'delete') {
            $id = (int)$_POST['id'];
            $stmt = $db->prepare("DELETE FROM articles WHERE id = ?");
            $stmt->execute([$id]);
            $message = 'Artikel berhasil dihapus!';
        }
    }
}

$articles = $db->query("SELECT * FROM articles ORDER BY published_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Artikel Blog & SEO - Admin Jelajah Kemuning</title>
    <link rel="stylesheet" href="/assets/css/style.min.css">
</head>
<body style="background:#F9FAFB;">
    <div style="background:var(--primary); color:#fff; padding:14px 24px; display:flex; justify-content:space-between; align-items:center;">
        <strong>🌿 Admin Jelajah Kemuning</strong>
        <div style="display:flex; gap:16px; font-size:14px;">
            <a href="/admin/index.php">Dashboard</a>
            <a href="/admin/paket.php">Paket & Harga</a>
            <a href="/admin/artikel.php" style="font-weight:700; text-decoration:underline;">Artikel SEO</a>
            <a href="/admin/galeri.php">Galeri</a>
            <a href="/admin/leads.php">Leads & GCLID</a>
            <a href="/admin/settings.php">Pengaturan</a>
            <a href="/" target="_blank">Lihat Web ↗</a>
            <a href="/admin/logout.php" style="color:#FCA5A5;">Keluar</a>
        </div>
    </div>

    <div class="container" style="padding:32px 16px;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <h1 style="font-size:1.75rem; font-weight:800;">Artikel Blog & Optimasi SEO</h1>
            <button onclick="openNewArticle()" class="btn-accent">+ Tulis Artikel Baru</button>
        </div>

        <?php if ($message): ?>
        <div style="background:#ECFDF5; color:#047857; padding:12px; border-radius:8px; margin-bottom:16px;">
            ✓ <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div style="background:#FEE2E2; color:#B91C1C; padding:12px; border-radius:8px; margin-bottom:16px;">
            ✕ <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <div style="background:#fff; border-radius:12px; border:1px solid #E5E7EB; overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; font-size:14px;">
                <thead>
                    <tr style="background:#F9FAFB; text-align:left; border-bottom:1px solid #E5E7EB;">
                        <th style="padding:12px 16px;">Judul Artikel</th>
                        <th style="padding:12px 16px;">Focus Keyword</th>
                        <th style="padding:12px 16px;">Views</th>
                        <th style="padding:12px 16px;">Status</th>
                        <th style="padding:12px 16px;">Tanggal</th>
                        <th style="padding:12px 16px; text-align:right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($articles)): ?>
                    <tr><td colspan="6" style="padding:24px; text-align:center; color:#9CA3AF;">Belum ada artikel yang ditulis.</td></tr>
                    <?php else: foreach ($articles as $art): ?>
                    <tr style="border-bottom:1px solid #F3F4F6;">
                        <td style="padding:12px 16px; font-weight:700;">
                            <a href="/artikel/<?= htmlspecialchars($art['slug']) ?>/" target="_blank" style="color:var(--primary);">
                                <?= htmlspecialchars($art['title']) ?> ↗
                            </a>
                        </td>
                        <td style="padding:12px 16px; font-family:monospace;"><?= htmlspecialchars($art['focus_keyword'] ?: '-') ?></td>
                        <td style="padding:12px 16px;"><?= $art['views'] ?></td>
                        <td style="padding:12px 16px;">
                            <span style="font-size:12px; padding:2px 8px; border-radius:99px; background:<?= $art['status'] === 'published' ? '#ECFDF5; color:#047857;' : '#F3F4F6; color:#6B7280;' ?>">
                                <?= htmlspecialchars($art['status']) ?>
                            </span>
                        </td>
                        <td style="padding:12px 16px; color:#6B7280; font-size:13px;"><?= date('d M Y', strtotime($art['published_at'])) ?></td>
                        <td style="padding:12px 16px; text-align:right;">
                            <button onclick='editArticle(<?= json_encode($art) ?>)' style="background:none; border:none; color:var(--primary); cursor:pointer; font-size:13px; font-weight:700; margin-right:12px;">Edit</button>
                            <form method="POST" style="display:inline;" onsubmit="return confirm('Hapus artikel ini?')">
                                <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $art['id'] ?>">
                                <button type="submit" style="background:none; border:none; color:#EF4444; cursor:pointer; font-size:13px; font-weight:600;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Add/Edit Article -->
    <div id="modal-add" class="hidden" style="position:fixed; inset:0; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center; z-index:999;">
        <div style="background:#fff; border-radius:12px; padding:24px; width:100%; max-width:700px; max-height:90vh; overflow-y:auto;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <h3 id="art-modal-title" style="font-size:18px; font-weight:800;">Tulis Artikel Blog & Cek Skor SEO</h3>
                <button onclick="document.getElementById('modal-add').classList.add('hidden')" style="background:none; border:none; font-size:20px; cursor:pointer;">✕</button>
            </div>
            <form method="POST">
                <input type="hidden" name="csrf" value="<?= Auth::generateCsrf() ?>">
                <input type="hidden" name="action" id="art-action" value="create">
                <input type="hidden" name="id" id="art-id" value="">
                <div style="margin-bottom:12px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Judul Artikel</label>
                    <input type="text" id="art-title" name="title" required placeholder="Contoh: 5 Tips Seru Offroad Jeep di Kemuning 2026" style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px;" oninput="updateSeoScore()">
                </div>
                <div style="margin-bottom:12px;">
                    <label style="display:block; font-size:13px; font-weight:600; margin-bottom:4px;">Konten Artikel (HTML / Teks)</label>
                    <textarea id="art-content" name="content" rows="8" required placeholder="Tulis isi artikel di sini..." style="width:100%; padding:8px; border:1px solid #D1D5DB; border-radius:6px; font-size:14px; font-family:sans-serif;"></textarea>
                </div>

                <!-- SEO Section -->
                <div style="background:#F0FDF4; border:1px solid #BBF7D0; border-radius:8px; padding:16px; margin-bottom:16px;">
                    <h4 style="font-size:14px; font-weight:700; color:#166534; margin-bottom:12px;">🔍 SEO Analyzer & SERP Preview</h4>
                    <div style="margin-bottom:10px;">
                        <label style="display:block; font-size:12px; font-weight:600; margin-bottom:2px;">Focus Keyword</label>
                        <input type="text" id="art-kw" name="focus_keyword" placeholder="Contoh: jeep kemuning" style="width:100%; padding:6px; border:1px solid #D1D5DB; border-radius:4px; font-size:13px;" oninput="updateSeoScore()">
                    </div>
                    <div style="margin-bottom:10px;">
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:2px;">
                            <span>Meta Title</span>
                            <span id="title-counter" style="color:#6B7280;">0 / 60</span>
                        </div>
                        <input type="text" id="art-meta-title" name="meta_title" placeholder="Meta title untuk hasil Google Search" style="width:100%; padding:6px; border:1px solid #D1D5DB; border-radius:4px; font-size:13px;" oninput="updateSeoScore()">
                    </div>
                    <div style="margin-bottom:12px;">
                        <div style="display:flex; justify-content:space-between; font-size:12px; font-weight:600; margin-bottom:2px;">
                            <span>Meta Description</span>
                            <span id="desc-counter" style="color:#6B7280;">0 / 160</span>
                        </div>
                        <textarea id="art-meta-desc" name="meta_description" rows="2" placeholder="Ringkasan artikel yang muncul di Google (120-160 karakter)" style="width:100%; padding:6px; border:1px solid #D1D5DB; border-radius:4px; font-size:13px;" oninput="updateSeoScore()"></textarea>
                    </div>

                    <!-- Google Preview Box -->
                    <div style="background:#fff; border:1px solid #E5E7EB; border-radius:6px; padding:12px;">
                        <div style="font-size:11px; color:#202124;">https://jelajahkemuning.com &gt; artikel</div>
                        <div id="preview-title" style="font-size:16px; color:#1a0dab; font-weight:500; cursor:pointer; text-decoration:underline;">Judul Artikel Google...</div>
                        <div id="preview-desc" style="font-size:13px; color:#4d5156; margin-top:2px;">Deskripsi artikel yang akan dibaca calon wisatawan di Google Search...</div>
                    </div>
                </div>

                <button type="submit" class="btn-accent" style="width:100%; justify-content:center;">Simpan & Publikasikan Artikel</button>
            </form>
        </div>
    </div>

    <script>
    function openNewArticle() {
        document.getElementById('art-modal-title').textContent = 'Tulis Artikel Blog & Cek Skor SEO';
        document.getElementById('art-action').value = 'create';
        document.getElementById('art-id').value = '';
        document.getElementById('art-title').value = '';
        document.getElementById('art-content').value = '';
        document.getElementById('art-kw').value = '';
        document.getElementById('art-meta-title').value = '';
        document.getElementById('art-meta-desc').value = '';
        updateSeoScore();
        document.getElementById('modal-add').classList.remove('hidden');
    }

    function editArticle(art) {
        document.getElementById('art-modal-title').textContent = 'Edit Artikel Blog';
        document.getElementById('art-action').value = 'update';
        document.getElementById('art-id').value = art.id;
        document.getElementById('art-title').value = art.title;
        document.getElementById('art-content').value = art.content;
        document.getElementById('art-kw').value = art.focus_keyword || '';
        document.getElementById('art-meta-title').value = art.meta_title || '';
        document.getElementById('art-meta-desc').value = art.meta_description || '';
        updateSeoScore();
        document.getElementById('modal-add').classList.remove('hidden');
    }

    function updateSeoScore() {
        const title = document.getElementById('art-title').value;
        const metaTitle = document.getElementById('art-meta-title').value || title;
        const metaDesc = document.getElementById('art-meta-desc').value;

        document.getElementById('title-counter').textContent = metaTitle.length + " / 60";
        document.getElementById('desc-counter').textContent = metaDesc.length + " / 160";

        document.getElementById('preview-title').textContent = metaTitle || 'Judul Artikel Google...';
        document.getElementById('preview-desc').textContent = metaDesc || 'Deskripsi artikel yang akan dibaca calon wisatawan di Google Search...';
    }
    </script>
</body>
</html>
