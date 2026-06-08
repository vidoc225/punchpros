<?php get_header(); ?>

<?php
$dl = static function ( string $file ) : string {
    return esc_url( get_theme_file_uri( 'assets/downloads/' . $file ) );
};
?>

<?php // ── Hero ── ?>
<section class="bg-black text-white pt-20 sm:pt-28 pb-24 sm:pb-32 text-center px-4 -mt-16">
    <p class="text-primary text-sm font-bold tracking-widest uppercase mb-3">Train like a champion</p>
    <h1 class="text-4xl sm:text-5xl md:text-6xl text-white" style="font-family:var(--font-heading)">TRAININGEN</h1>
    <p class="text-gray-400 mt-4 max-w-2xl mx-auto text-lg">Gratis trainingsschema's voor boksen en vechtsporten. Download de PDF en train waar en wanneer je wilt.</p>
    <div class="flex flex-wrap justify-center gap-3 mt-10" id="pp-training-filters">
        <button class="btn text-sm tracking-widest pp-filter-btn active" data-filter="all">ALLE</button>
        <button class="btn text-sm tracking-widest pp-filter-btn" data-filter="bokszak">BOKSZAK TRAINING</button>
        <button class="btn text-sm tracking-widest pp-filter-btn" data-filter="conditie">CONDITIONEEL</button>
        <button class="btn text-sm tracking-widest pp-filter-btn" data-filter="combinaties">COMBINATIES</button>
    </div>
</section>

<?php // ══════════════════════════════════════════════════
      // ── 1. BOKSZAK TRAINING – Tempo en Ritme ──
      // ══════════════════════════════════════════════════ ?>
<section id="bokszak-training" class="bg-white px-6 py-16 sm:py-24 pp-training-section" data-training="bokszak">
    <div class="max-w-3xl mx-auto">
        <div class="mb-10">
            <p class="text-primary text-xs font-bold tracking-widest uppercase mb-2">8 rondes van 3 minuten</p>
            <h2 class="text-3xl sm:text-4xl text-dark mb-3" style="font-family:var(--font-heading)">BOKSZAK TRAINING – TEMPO EN RITME</h2>
            <p class="text-gray-500 text-lg">Een goede bokser kan het tempo van een partij bepalen. Door af te wisselen tussen enkele stoten, dubbele stoten en langere combinaties wordt het voor een tegenstander moeilijker om je acties te lezen en te verdedigen.</p>
        </div>

        <?php // Warming-up ?>
        <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 mb-4">
            <h3 class="text-base mb-3 text-dark" style="font-family:var(--font-heading)">WARMING-UP EN SCHADUWBOKSEN</h3>
            <ul class="space-y-2">
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>2 rondes van 3 minuten schaduwboksen</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Werk met een denkbeeldige tegenstander</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Focus op techniek, ritme en beweging</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Gebruik verschillende combinaties</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Houd een actieve bokshouding aan</span></li>
            </ul>
        </div>

        <?php // Rondes ?>
        <div class="space-y-4">
            <?php
            $bokszak_rondes = [
                [ 'Ronde 1', 'Voorhand directe hoog – Voorhand directe hoog', 'Werk continu met de dubbele jab. Focus op snelheid en volume.' ],
                [ 'Ronde 2', 'Voorhand directe hoog – Voorhand directe hoog – Stoothand directe hoog', 'Laat de achterhand krachtig volgen. Direct terug naar dekking.' ],
                [ 'Ronde 3', 'Voorhand directe hoog – Stoothand directe hoog – Voorhand directe hoog', 'Werk aan een vloeiende combinatie. Blijf ontspannen.' ],
                [ 'Ronde 4', 'Voorhand directe hoog – Voorhand hoek hoog', 'Wissel tussen rechte en gebogen stoten. Focus op techniek.' ],
                [ 'Ronde 5', 'Voorhand directe hoog – Voorhand hoek hoog – Stoothand directe hoog', 'Bouw de aanval op. Versnel de laatste stoot.' ],
                [ 'Ronde 6', 'Dubbele voorhand directe hoog – Stoothand directe hoog', 'Zet druk op de zak. Blijf doorbewegen.' ],
                [ 'Ronde 7', 'Voorhand directe hoog – Stoothand directe hoog – Voorhand hoek hoog – Stoothand directe hoog', 'Werk in een hoog tempo. Focus op ritme en controle.' ],
                [ 'Ronde 8', 'Voorhand directe hoog – Voorhand directe hoog – Stoothand directe hoog – Voorhand hoek hoog – Stoothand directe hoog', 'Lange combinatie. Werk de volledige ronde zonder stil te vallen.' ],
            ];
            foreach ( $bokszak_rondes as $r ) : ?>
                <div class="bg-gray-50 rounded-2xl p-6 sm:p-8">
                    <h3 class="text-base mb-2 text-dark" style="font-family:var(--font-heading)"><?php echo esc_html( strtoupper( $r[0] ) ); ?></h3>
                    <p class="text-sm font-semibold text-black mb-1"><?php echo esc_html( $r[1] ); ?></p>
                    <p class="text-sm text-gray-500 mb-0"><?php echo esc_html( $r[2] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 p-6 bg-primary/10 rounded-2xl">
            <p class="text-sm text-dark mb-1" style="font-family:var(--font-heading)">COACHINGTIP</p>
            <p class="text-gray-600 text-sm mb-0">Laat de bokszak niet bepalen wat jij doet. Jij bepaalt het tempo. Werk actief, blijf in balans en zorg dat iedere combinatie technisch correct wordt uitgevoerd. De nadruk ligt op kwaliteit, ritme en volume, niet alleen op kracht.</p>
        </div>

        <div class="mt-8 text-center">
            <a href="<?php echo $dl( 'bokszak-training.pdf' ); ?>" download class="btn inline-flex items-center gap-2 text-sm tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                DOWNLOAD GRATIS PDF
            </a>
        </div>
    </div>
</section>

<?php // ══════════════════════════════════════════════════
      // ── 2. CONDITIE TRAINING – Creatinefosfaat Systeem ──
      // ══════════════════════════════════════════════════ ?>
<section id="conditioneel" class="bg-gray-50 px-6 py-16 sm:py-24 pp-training-section" data-training="conditie">
    <div class="max-w-3xl mx-auto">
        <div class="mb-10">
            <p class="text-primary text-xs font-bold tracking-widest uppercase mb-2">8 rondes van 3 minuten – interval</p>
            <h2 class="text-3xl sm:text-4xl text-dark mb-3" style="font-family:var(--font-heading)">CONDITIE TRAINING – ATP-PC SYSTEEM</h2>
            <p class="text-gray-500 text-lg">Tijdens een bokswedstrijd worden regelmatig korte, explosieve acties uitgevoerd. Door gericht te trainen op het creatinefosfaat systeem verbeter je explosiviteit, startsnelheid, stootsnelheid en herstel tussen explosieve acties.</p>
        </div>

        <div class="bg-white rounded-2xl p-6 sm:p-8 mb-4">
            <h3 class="text-base mb-3 text-dark" style="font-family:var(--font-heading)">WARMING-UP</h3>
            <p class="text-sm text-gray-600 mb-3">2 x 3 minuten schaduwboksen</p>
            <ul class="space-y-2">
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Actieve voeten</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Snelle voorhand</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Explosieve bewegingen</span></li>
                <li class="flex items-start gap-3 text-gray-600 text-sm"><span class="text-primary mt-0.5 flex-shrink-0">&#10003;</span><span>Technisch correcte stoten</span></li>
            </ul>
        </div>

        <div class="bg-white rounded-2xl p-6 sm:p-8 mb-4">
            <h3 class="text-base mb-2 text-dark" style="font-family:var(--font-heading)">WERK-RUST VERHOUDING</h3>
            <p class="text-sm font-semibold text-black">10 seconden maximaal werken – 20 seconden actief bewegen</p>
            <p class="text-sm text-gray-500">Gedurende één ronde worden deze intervallen steeds herhaald.</p>
        </div>

        <div class="space-y-4">
            <?php
            $conditie_rondes = [
                [ 'Ronde 1 – Explosieve Jab', 'Voorhand directe hoog op maximale snelheid.', 'Maximale armsnelheid ontwikkelen.' ],
                [ 'Ronde 2 – Dubbele Jab Sprint', 'Dubbele voorhand directe hoog.', 'Explosief openen van aanvallen.' ],
                [ 'Ronde 3 – 1-2 Sprint', 'Voorhand directe hoog – Stoothand directe hoog.', 'Explosieve aanvalsinzet.' ],
                [ 'Ronde 4 – Vierstoots Sprint', 'Voorhand directe hoog – Stoothand directe hoog – Voorhand hoek hoog – Stoothand directe hoog.', 'Explosief doorstoten.' ],
                [ 'Ronde 5 – Power Burst', 'Alle stoten met maximale intentie.', 'Maximale krachtontwikkeling.' ],
                [ 'Ronde 6 – Level Change Sprint', 'Voorhand directe hoog – Stoothand directe laag.', 'Explosiviteit combineren met level changing.' ],
                [ 'Ronde 7 – Wedstrijdactie', 'Vrije combinatie van 4 tot 6 stoten.', 'Wedstrijdspecifieke explosiviteit.' ],
                [ 'Ronde 8 – Eindsprint', 'Maximaal aantal technisch correcte stoten.', 'Maximale output leveren onder vermoeidheid.' ],
            ];
            foreach ( $conditie_rondes as $r ) : ?>
                <div class="bg-white rounded-2xl p-6 sm:p-8">
                    <h3 class="text-base mb-2 text-dark" style="font-family:var(--font-heading)"><?php echo esc_html( strtoupper( $r[0] ) ); ?></h3>
                    <p class="text-sm font-semibold text-black mb-1">10 sec: <?php echo esc_html( $r[1] ); ?></p>
                    <p class="text-sm text-gray-500 mb-0">Doel: <?php echo esc_html( $r[2] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 p-6 bg-primary/10 rounded-2xl">
            <p class="text-sm text-dark mb-1" style="font-family:var(--font-heading)">COACHINGTIP</p>
            <p class="text-gray-600 text-sm mb-0">Tijdens deze training draait het niet om continu werken, maar om het leveren van een maximale inspanning tijdens de werkperiode. Iedere explosieve actie moet worden uitgevoerd met maximale snelheid, intentie en technische controle.</p>
        </div>

        <div class="mt-8 text-center">
            <a href="<?php echo $dl( 'conditie-training.pdf' ); ?>" download class="btn inline-flex items-center gap-2 text-sm tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                DOWNLOAD GRATIS PDF
            </a>
        </div>
    </div>
</section>

<?php // ══════════════════════════════════════════════════
      // ── 3. COMBO TRAINING 1 – Voorhandcombinaties ──
      // ══════════════════════════════════════════════════ ?>
<section id="combinaties" class="bg-white px-6 py-16 sm:py-24 pp-training-section" data-training="combinaties">
    <div class="max-w-3xl mx-auto">
        <div class="mb-10">
            <p class="text-primary text-xs font-bold tracking-widest uppercase mb-2">8 rondes van 3 minuten – pads of schaduwboksen</p>
            <h2 class="text-3xl sm:text-4xl text-dark mb-3" style="font-family:var(--font-heading)">COMBO TRAINING 1 – VOORHANDCOMBINATIES EN LEVEL CHANGING</h2>
            <p class="text-gray-500 text-lg">In het amateurboksen wordt de voorste hand het meest gebruikt. In deze training leer je meer over het gebruik van de voorhand binnen verschillende combinaties, met aandacht voor hoogteverschillen (level changing).</p>
        </div>

        <div class="space-y-4">
            <?php
            $combo1_rondes = [
                [ 'Ronde 1', 'Voorhand directe hoog', 'Alleen de voorhand directe. Focus op snelheid en het direct terugtrekken van de hand.' ],
                [ 'Ronde 2', 'Voorhand directe hoog – Stoothand directe laag', 'Werk aan het wisselen van hoogte tussen de stoten.' ],
                [ 'Ronde 3', 'Voorhand directe hoog – Stoothand directe laag – Voorhand hoek hoog', 'Voeg een hoekstoot toe na de directe stoten.' ],
                [ 'Ronde 4', 'Stoothand directe laag – Voorhand hoek hoog', 'Focus op een vloeiende overgang van laag naar hoog.' ],
                [ 'Ronde 5', 'Stoothand directe laag – Voorhand hoek hoog – Stoothand directe hoog', 'Werk aan ritme en snelheid binnen de combinatie.' ],
                [ 'Ronde 6', 'Voorhand directe laag – Stoothand directe hoog', 'Verander van niveau tijdens de combinatie.' ],
                [ 'Ronde 7', 'Voorhand directe laag – Stoothand directe hoog – Voorhand hoek hoog', 'Combineer level changing met een afsluitende hoekstoot.' ],
                [ 'Ronde 8', 'Voorhand directe hoog – Stoothand directe hoog – Voorhand directe laag – Stoothand directe hoog', 'Focus op het afwisselen van hoge en lage doelen binnen één combinatie.' ],
            ];
            foreach ( $combo1_rondes as $r ) : ?>
                <div class="bg-gray-50 rounded-2xl p-6 sm:p-8">
                    <h3 class="text-base mb-2 text-dark" style="font-family:var(--font-heading)"><?php echo esc_html( strtoupper( $r[0] ) ); ?></h3>
                    <p class="text-sm font-semibold text-black mb-1"><?php echo esc_html( $r[1] ); ?></p>
                    <p class="text-sm text-gray-500 mb-0"><?php echo esc_html( $r[2] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 p-6 bg-primary/10 rounded-2xl">
            <p class="text-sm text-dark mb-1" style="font-family:var(--font-heading)">COACHINGTIP</p>
            <p class="text-gray-600 text-sm mb-0">Blijf tijdens alle rondes goed bewegen, houd je dekking hoog en zorg ervoor dat iedere stoot direct terugkeert naar de uitgangspositie. Kwaliteit gaat boven kracht en snelheid.</p>
        </div>

        <div class="mt-8 text-center">
            <a href="<?php echo $dl( 'combo-training-1.pdf' ); ?>" download class="btn inline-flex items-center gap-2 text-sm tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                DOWNLOAD GRATIS PDF
            </a>
        </div>
    </div>
</section>

<?php // ══════════════════════════════════════════════════
      // ── 4. COMBO TRAINING 2 – Tempo en Ritme ──
      // ══════════════════════════════════════════════════ ?>
<section class="bg-gray-50 px-6 py-16 sm:py-24 pp-training-section" data-training="combinaties">
    <div class="max-w-3xl mx-auto">
        <div class="mb-10">
            <p class="text-primary text-xs font-bold tracking-widest uppercase mb-2">8 rondes van 3 minuten – pads of schaduwboksen</p>
            <h2 class="text-3xl sm:text-4xl text-dark mb-3" style="font-family:var(--font-heading)">COMBO TRAINING 2 – TEMPO EN RITME</h2>
            <p class="text-gray-500 text-lg">Een goede bokser slaat niet altijd harder of sneller dan zijn tegenstander, maar weet vaak beter te variëren in tempo en ritme. In deze module ligt de nadruk op het creëren van openingen door middel van dubbele aanvallen.</p>
        </div>

        <div class="space-y-4">
            <?php
            $combo2_rondes = [
                [ 'Ronde 1', 'Voorhand directe hoog – Voorhand directe hoog', 'Dubbele jab. Focus op snelheid en afstand.' ],
                [ 'Ronde 2', 'Voorhand directe hoog – Voorhand directe hoog – Stoothand directe hoog', 'Dubbele voorhand gevolgd door een krachtige achterhand.' ],
                [ 'Ronde 3', 'Voorhand directe hoog – Stoothand directe hoog – Voorhand directe hoog', 'Werk aan een vloeiende drie-stootscombinatie.' ],
                [ 'Ronde 4', 'Voorhand directe hoog – Voorhand hoek hoog', 'Wissel van rechte lijn naar hoek.' ],
                [ 'Ronde 5', 'Voorhand directe hoog – Voorhand hoek hoog – Stoothand directe hoog', 'Bouw de combinatie rustig op en versnel de laatste stoot.' ],
                [ 'Ronde 6', 'Dubbele voorhand directe hoog – Stoothand directe hoog', 'Creëer druk met de voorhand.' ],
                [ 'Ronde 7', 'Voorhand directe hoog – Stoothand directe hoog – Voorhand hoek hoog – Stoothand directe hoog', 'Werk aan ritme en doorstoten.' ],
                [ 'Ronde 8', 'Voorhand directe hoog – Voorhand directe hoog – Stoothand directe hoog – Voorhand hoek hoog – Stoothand directe hoog', 'Lange combinatie. Focus op techniek en ontspanning.' ],
            ];
            foreach ( $combo2_rondes as $r ) : ?>
                <div class="bg-white rounded-2xl p-6 sm:p-8">
                    <h3 class="text-base mb-2 text-dark" style="font-family:var(--font-heading)"><?php echo esc_html( strtoupper( $r[0] ) ); ?></h3>
                    <p class="text-sm font-semibold text-black mb-1"><?php echo esc_html( $r[1] ); ?></p>
                    <p class="text-sm text-gray-500 mb-0"><?php echo esc_html( $r[2] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-6 p-6 bg-primary/10 rounded-2xl">
            <p class="text-sm text-dark mb-1" style="font-family:var(--font-heading)">COACHINGTIP</p>
            <p class="text-gray-600 text-sm mb-0">Probeer niet iedere stoot met maximale kracht te slaan. Gebruik je voorhand om afstand te bepalen, ritme te creëren en openingen te maken voor je vervolgacties. Een goede bokser bepaalt het tempo van de wedstrijd en dwingt zijn tegenstander om te reageren.</p>
        </div>

        <div class="mt-8 text-center">
            <a href="<?php echo $dl( 'combo-training-2.pdf' ); ?>" download class="btn inline-flex items-center gap-2 text-sm tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                DOWNLOAD GRATIS PDF
            </a>
        </div>
    </div>
</section>

<?php // ── CTA ── ?>
<section class="bg-black text-white py-16 sm:py-24 text-center px-4">
    <h2 class="text-2xl sm:text-3xl mb-4 text-white" style="font-family:var(--font-heading)">TRAIN MET DE BESTE BESCHERMING</h2>
    <p class="text-gray-400 max-w-xl mx-auto mb-8">Voorkom blessures en train op vol vermogen met PunchPros knokkelbeschermers. Gebruikt door olympische kampioenen.</p>
    <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn inline-block text-sm tracking-widest">
        BEKIJK DE SHOP &rarr;
    </a>
</section>

<script>
(function () {
    var buttons  = document.querySelectorAll('.pp-filter-btn');
    var sections = document.querySelectorAll('.pp-training-section');
    if (!buttons.length || !sections.length) return;

    buttons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = this.getAttribute('data-filter');

            // Update active button
            buttons.forEach(function (b) {
                b.classList.remove('btn-outline-active');
                b.style.opacity = '0.5';
            });
            this.style.opacity = '1';
            this.classList.add('btn-outline-active');

            // Show/hide sections
            sections.forEach(function (sec) {
                if (filter === 'all' || sec.getAttribute('data-training') === filter) {
                    sec.style.display = '';
                } else {
                    sec.style.display = 'none';
                }
            });

            // Scroll to first visible section
            if (filter !== 'all') {
                var first = document.querySelector('.pp-training-section[data-training="' + filter + '"]');
                if (first) {
                    first.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    });

    // Set initial state: all visible, "ALLE" button active
    buttons.forEach(function (b) {
        b.style.opacity = b.getAttribute('data-filter') === 'all' ? '1' : '0.5';
    });
})();
</script>

<?php get_footer(); ?>
