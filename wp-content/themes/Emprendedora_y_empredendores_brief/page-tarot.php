<?php
/**
 * Template: Lectura de Tarot (/laferia/tarot/)
 * Página autónoma para reservar un turno de lectura de tarot en la feria.
 * El envío se guarda en WordPress (respaldo) y se sincroniza con Google Sheets.
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 */

get_header();
?>

<div class="tarot-page-wrap">
    <section class="tarot-hero">
        <div class="tarot-hero-inner">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-alina.png' ); ?>" alt="Alina" class="tarot-logo">
            <h1 class="tarot-title">Reserva tu Lectura de Tarot</h1>
            <p class="tarot-subtitle">Déjanos tus datos y te contactaremos para confirmar tu turno durante la feria.</p>
        </div>
    </section>

    <section class="tarot-form-section">
        <div class="tarot-form-card">

            <form id="form-tarot" onsubmit="submitTarotForm(event)">
                <input type="hidden" name="action" value="guardar_registro_tarot">
                <input type="hidden" name="nonce" value="<?php echo esc_attr( wp_create_nonce( 'empoderadas_tarot_nonce' ) ); ?>">
                <!-- Honeypot anti-spam: campo oculto, invisible para personas -->
                <input type="text" name="website" class="tarot-honeypot" tabindex="-1" autocomplete="off" aria-hidden="true">

                <div class="form-group">
                    <label for="tarot_nombre">Nombre y Apellidos *</label>
                    <input type="text" id="tarot_nombre" name="nombre" placeholder="Ej: María Pérez" required>
                </div>
                <div class="form-group">
                    <label for="tarot_celular">Celular *</label>
                    <input type="tel" id="tarot_celular" name="celular" pattern="[0-9]{7,15}" inputmode="numeric" placeholder="Ej: 987654321" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                </div>
                <div class="form-group">
                    <label for="tarot_correo">Correo Electrónico *</label>
                    <input type="email" id="tarot_correo" name="correo" placeholder="Ej: maria@correo.com" required>
                </div>

                <button type="submit" class="submit-btn btn-tarot">
                    <span class="btn-label">Reservar mi Lectura</span>
                </button>
                <div class="form-message" role="status" aria-live="polite"></div>
            </form>

        </div>

        <div class="tarot-limited-banner">
            <div class="tarot-limited-text">
                <span class="tarot-limited-eyebrow">Reserva ya</span>
                <span class="tarot-limited-big">CUPOS<br>LIMITADOS</span>
                <span class="tarot-limited-caption">Antes que se agoten los turnos de la feria</span>
            </div>
        </div>
    </section>
</div>

<!-- Footer propio de La Feria (distinto del footer general del sitio) -->
<footer class="tarot-footer">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-la-feria.png' ); ?>" alt="La Feria" class="tarot-footer-logo">

    <div class="tarot-footer-socials">
        <a href="https://www.instagram.com/la.feria/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">IG</a>
        <a href="https://www.tiktok.com/@la.feria.barranco" target="_blank" rel="noopener noreferrer" aria-label="TikTok">TT</a>
    </div>

    <p class="tarot-footer-copy">&copy; <?php echo date( 'Y' ); ?> La Feria. Todos los derechos reservados.</p>
</footer>

<!-- Modal de confirmación -->
<div id="tarot-success-modal" class="tarot-modal">
    <div class="tarot-modal-content">
        <span class="tarot-modal-close" onclick="closeTarotModal()">&times;</span>
        <div class="tarot-modal-icon">&#10003;</div>
        <h3 class="tarot-modal-title">¡Gracias por tu inscripción!</h3>
        <p class="tarot-modal-text">Muchas gracias por tu inscripción, nos contactaremos en la brevedad.</p>
        <button type="button" class="tarot-modal-btn" onclick="closeTarotModal()">Aceptar</button>
    </div>
</div>

<style>
.tarot-page-wrap {
    font-family: 'Cormorant Garamond', serif;
    color: #4A3560;
    background: #FFF9FB;
    overflow-x: hidden;
    min-height: 70vh;
}

/* Ocultar la barra de header (logo + menú) solo en esta página */
#ee-site-header {
    display: none !important;
}

.tarot-hero {
    background: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/bg-tarot.webp' ); ?>') center center / cover no-repeat;
    padding: clamp(50px, 8vw, 80px) clamp(20px, 6vw, 56px) 70px;
    text-align: center;
}

.tarot-hero-inner {
    max-width: 720px;
    margin: 0 auto;
}

.tarot-logo {
    height: clamp(110px, 16vw, 150px);
    width: auto;
    margin-bottom: 1.5rem;
    filter: drop-shadow(0 4px 14px rgba(0,0,0,0.45));
}

.tarot-title {
    color: #fff;
    font-family: 'Obviously Narrow', sans-serif;
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    text-transform: uppercase;
    line-height: 1.15;
    margin-bottom: 1rem;
    text-shadow: 0 2px 10px rgba(74,53,80,0.3);
}

.tarot-subtitle {
    color: #fff;
    font-size: 1.2rem;
    opacity: 0.95;
    line-height: 1.5;
}

.tarot-form-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0 1.5rem 5rem;
    margin-top: -48px;
}

.tarot-form-card {
    background-color: #FFF9FB;
    width: 100%;
    max-width: 480px;
    padding: 2.5rem;
    border: 1px solid rgba(146, 131, 181, 0.15);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(74, 53, 80, 0.15);
    font-family: 'Obviously Narrow', sans-serif;
}

.tarot-limited-banner {
    margin-top: 1.5rem;
    width: 100%;
    max-width: 420px;
    background: #4A3560;
    border-radius: 16px;
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
}

.tarot-limited-text {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    line-height: 1.1;
}

.tarot-limited-eyebrow {
    font-family: 'Oswald', sans-serif;
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #fff;
}

.tarot-limited-big {
    font-family: 'Obviously Narrow', sans-serif;
    font-size: 2.1rem;
    font-weight: 900;
    text-transform: uppercase;
    color: #e28fae;
    line-height: 0.95;
    margin: 0.3rem 0;
}

.tarot-limited-caption {
    font-family: 'Oswald', sans-serif;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.75);
    font-weight: 500;
}

@media (max-width: 480px) {
    .tarot-limited-big {
        font-size: 1.8rem;
    }
}

.tarot-honeypot {
    position: absolute !important;
    left: -9999px !important;
    width: 1px;
    height: 1px;
    opacity: 0;
    pointer-events: none;
}

.form-group {
    margin-bottom: 1.2rem;
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 0.95rem;
    font-weight: 600;
    color: #4A3560;
    margin-bottom: 0.4rem;
}

.form-group input {
    padding: 0.8rem;
    border: 1.5px solid #dcd6e5;
    border-radius: 8px;
    font-size: 1rem;
    outline: none;
    transition: all 0.2s ease;
    font-family: 'Oswald', sans-serif;
}

.form-group input:focus {
    border-color: #9283b5;
    box-shadow: 0 0 0 3px rgba(146, 131, 181, 0.2);
}

.form-group input:not(:placeholder-shown):not(:focus):invalid {
    border-color: #e58ba9;
    background-color: #fff8fa;
    box-shadow: 0 0 0 3px rgba(229, 139, 169, 0.15);
}

.form-group input:not(:placeholder-shown):not(:focus):valid {
    border-color: #a3cfbb;
    background-color: #f8fffb;
}

.submit-btn {
    width: 100%;
    padding: 1rem;
    border: none;
    border-radius: 10px;
    font-size: 1.2rem;
    font-weight: 700;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase;
    transition: all 0.2s ease;
    margin-top: 0.5rem;
    font-family: 'Oswald', sans-serif;
}

.btn-tarot {
    background-color: #7e579b;
}
.btn-tarot:hover {
    background-color: #6a4785;
}
.btn-tarot:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.form-message {
    margin-top: 1rem;
    text-align: center;
    font-size: 1.05rem;
    font-weight: 600;
    min-height: 1.4em;
    font-family: 'Oswald', sans-serif;
}

@media (max-width: 600px) {
    .tarot-form-card {
        padding: 2rem 1.5rem;
    }
}

/* Footer propio de La Feria */
.tarot-footer {
    background: #4A3560;
    padding: 2.5rem 1.5rem;
    text-align: center;
}

.tarot-footer-logo {
    height: 64px;
    width: auto;
    filter: brightness(0) invert(1);
    margin-bottom: 1.25rem;
}

.tarot-footer-socials {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 1.25rem;
}

.tarot-footer-socials a {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #fff;
    color: #4A3560;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Oswald', sans-serif;
    font-weight: 700;
    font-size: 12px;
    text-decoration: none;
    transition: transform 0.25s ease;
}

.tarot-footer-socials a:hover {
    transform: scale(1.08);
}

.tarot-footer-copy {
    font-family: 'Oswald', sans-serif;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.85);
}

/* Modal de confirmación */
.tarot-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(74, 53, 80, 0.4);
    backdrop-filter: blur(8px);
}

.tarot-modal-content {
    background-color: #FFF9FB;
    margin: 12% auto;
    padding: 2.5rem;
    border: 1px solid rgba(146, 131, 181, 0.1);
    width: 90%;
    max-width: 420px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(74, 53, 80, 0.15);
    position: relative;
    text-align: center;
    font-family: 'Obviously Narrow', sans-serif;
}

.tarot-modal-close {
    position: absolute;
    right: 1.5rem;
    top: 1rem;
    color: #7e579b;
    font-size: 2rem;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.2s ease;
}

.tarot-modal-close:hover {
    color: #000;
}

.tarot-modal-icon {
    width: 56px;
    height: 56px;
    margin: 0 auto 1rem;
    border-radius: 50%;
    background: #a3cfbb;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    font-weight: 700;
}

.tarot-modal-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #7e579b;
    margin-bottom: 0.75rem;
}

.tarot-modal-text {
    font-family: 'Oswald', sans-serif;
    font-size: 1.05rem;
    color: #555;
    line-height: 1.5;
    margin-bottom: 1.5rem;
}

.tarot-modal-btn {
    width: 100%;
    padding: 0.9rem;
    border: none;
    border-radius: 10px;
    font-size: 1.05rem;
    font-weight: 700;
    color: #fff;
    background-color: #7e579b;
    cursor: pointer;
    text-transform: uppercase;
    font-family: 'Oswald', sans-serif;
    transition: all 0.2s ease;
}

.tarot-modal-btn:hover {
    background-color: #6a4785;
}
</style>

<script>
function submitTarotForm(event) {
    event.preventDefault();
    const form = event.target;
    const messageDiv = form.querySelector('.form-message');
    const submitBtn = form.querySelector('.submit-btn');
    const btnLabel = submitBtn.querySelector('.btn-label');

    messageDiv.textContent = 'Enviando...';
    messageDiv.style.color = '#7e579b';
    submitBtn.disabled = true;
    btnLabel.textContent = 'Enviando...';

    const formData = new FormData(form);

    fetch('<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            messageDiv.textContent = '';
            form.reset();
            openTarotModal();
        } else {
            messageDiv.textContent = (data.data && data.data.message) || 'Error al enviar el formulario.';
            messageDiv.style.color = 'red';
        }
    })
    .catch(function () {
        messageDiv.textContent = 'Error de conexión. Inténtalo de nuevo.';
        messageDiv.style.color = 'red';
    })
    .finally(function () {
        submitBtn.disabled = false;
        btnLabel.textContent = 'Reservar mi Lectura';
    });
}

function openTarotModal() {
    const modal = document.getElementById('tarot-success-modal');
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeTarotModal() {
    const modal = document.getElementById('tarot-success-modal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Cerrar al hacer clic fuera del modal
window.addEventListener('click', function (event) {
    if (event.target.classList.contains('tarot-modal')) {
        closeTarotModal();
    }
});
</script>

<?php
// Footer propio de esta página (no se usa get_footer() / footer.php del sitio general)
wp_footer();
?>
</body>
</html>
