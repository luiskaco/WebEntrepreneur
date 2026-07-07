<section class="home-cta-section">
    <!-- Bird Left -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pajaro-izq.webp" alt="Decoración Izquierda" class="cta-bird cta-bird-left">
    
    <!-- Bird Right -->
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pajaro-der.webp" alt="Decoración Derecha" class="cta-bird cta-bird-right">

    <div class="container text-center cta-content-wrapper">
        <h2 class="cta-title">¿LISTA PARA SABER MÁS DE NOSOTRAS?</h2>

        <!-- Buttons Row -->
        <div class="cta-pills-row">
            <button class="cta-pill cta-pill-purple" onclick="openCtaModal('feriante')">
                QUIERO SER FERIANTE
            </button>
            <button class="cta-pill cta-pill-pink" onclick="openCtaModal('comunidad')">
                ÚNETE A NUESTRA COMUNIDAD
            </button>
        </div>

        <!-- Text Row -->
        <div class="cta-text-row">
            <div class="cta-text-col">
                Déjanos tus datos y sé de las primeras en conocer convocatorias, beneficios y oportunidades para tu marca.
            </div>
            <div class="cta-text-col">
                Sé parte de la comunidad de nuestra comunidad y recibe información sobre actividades especiales.
            </div>
        </div>
    </div>
</section>

<!-- Modal: Quiero ser feriante -->
<div id="modal-feriante" class="cta-modal">
    <div class="cta-modal-content">
        <span class="cta-modal-close" onclick="closeCtaModal('feriante')">&times;</span>
        <h3 class="modal-title purple-text">QUIERO SER FERIANTE</h3>
        <form id="form-feriante" onsubmit="submitCtaForm(event, 'feriante')">
            <input type="hidden" name="action" value="guardar_registro_cta">
            <input type="hidden" name="form_type" value="feriante">
            
            <div class="form-group">
                <label>Nombre y Apellidos *</label>
                <input type="text" name="nombre" placeholder="Ej: María Pérez" required>
            </div>
            <div class="form-group">
                <label>Nombre del Emprendimiento *</label>
                <input type="text" name="emprendimiento" placeholder="Ej: Dulce Detalle" required>
            </div>
            <div class="form-group">
                <label>Rubro del Emprendimiento *</label>
                <input type="text" name="rubro" placeholder="Ej: Pastelería / Regalos" required>
            </div>
            <div class="form-group">
                <label>Ciudad *</label>
                <input type="text" name="ciudad" placeholder="Ej: Lima" required>
            </div>
            <div class="form-group">
                <label>Celular *</label>
                <input type="tel" name="celular" pattern="[0-9]{7,15}" inputmode="numeric" placeholder="Ej: 987654321" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            </div>
            <div class="form-group">
                <label>Correo Electrónico *</label>
                <input type="email" name="correo" placeholder="Ej: maria@correo.com" required>
            </div>
            <div class="form-group">
                <label>Instagram / Facebook (Opcional)</label>
                <input type="text" name="instagram" placeholder="Ej: @miemprendimiento">
            </div>
            <div class="form-group">
                <label>Página Web (Opcional)</label>
                <input type="url" name="web" placeholder="Ej: https://miweb.com">
            </div>
            
            <button type="submit" class="submit-btn btn-purple">Enviar Registro</button>
            <div class="form-message"></div>
        </form>
    </div>
</div>

<!-- Modal: Únete a nuestra comunidad -->
<div id="modal-comunidad" class="cta-modal">
    <div class="cta-modal-content">
        <span class="cta-modal-close" onclick="closeCtaModal('comunidad')">&times;</span>
        <h3 class="modal-title pink-text">ÚNETE A NUESTRA COMUNIDAD</h3>
        <form id="form-comunidad" onsubmit="submitCtaForm(event, 'comunidad')">
            <input type="hidden" name="action" value="guardar_registro_cta">
            <input type="hidden" name="form_type" value="comunidad">
            
            <div class="form-group">
                <label>Nombre y Apellidos *</label>
                <input type="text" name="nombre" placeholder="Ej: María Pérez" required>
            </div>
            <div class="form-group">
                <label>Celular *</label>
                <input type="tel" name="celular" pattern="[0-9]{7,15}" inputmode="numeric" placeholder="Ej: 987654321" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
            </div>
            <div class="form-group">
                <label>Correo Electrónico *</label>
                <input type="email" name="correo" placeholder="Ej: maria@correo.com" required>
            </div>
            <div class="form-group">
                <label>Ciudad *</label>
                <input type="text" name="ciudad" placeholder="Ej: Lima" required>
            </div>
            
            <button type="submit" class="submit-btn btn-pink">Unirme a la comunidad</button>
            <div class="form-message"></div>
        </form>
    </div>
</div>

<style>
.home-cta-section {
    position: relative;
    background: #FFF;
    width: 100%;
    overflow: hidden;
    padding: 5rem 0;
}

.cta-content-wrapper {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
    padding: 0 1.5rem;
}

.cta-bird {
    position: absolute;
    bottom: -50px;
    max-height: 500px;
    width: auto;
    z-index: 1;
    pointer-events: none;
    display: block;
}

.cta-bird-left {
    left: 20px;
}

.cta-bird-right {
    right: 20px;
}

.cta-title {
    color: #8f79b2;
    font-size: 2.4rem;
    font-weight: 800;
    margin-bottom: 3rem;
    text-transform: uppercase;
    font-family: 'Obviously Narrow', sans-serif;
    text-align: center;
    width: 100%;
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 1s ease, transform 1s ease;
}

.home-cta-section.animate-active .cta-title {
    opacity: 1;
    transform: translateY(0);
}

.cta-pills-row {
    display: flex;
    justify-content: center;
    align-items: stretch;
    margin-bottom: 2rem;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    opacity: 0;
    transform: scale(0.95);
    transition: opacity 1s ease 0.3s, transform 1s ease 0.3s;
}

.home-cta-section.animate-active .cta-pills-row {
    opacity: 1;
    transform: scale(1);
}

.cta-pill {
    flex: 1;
    padding: 1.5rem;
    color: #fff !important;
    font-size: 1.3rem;
    font-weight: 700;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    font-family: 'Obviously Narrow', sans-serif;
}

.cta-pill-purple {
    background-color: #9283b5;
}

.cta-pill-purple:hover {
    background-color: #7b6ba0;
}

.cta-pill-pink {
    background-color: #e28fae;
}

.cta-pill-pink:hover {
    background-color: #d17898;
}

.cta-text-row {
    display: flex;
    justify-content: center;
    gap: 3rem;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 1s ease 0.6s, transform 1s ease 0.6s;
}

.home-cta-section.animate-active .cta-text-row {
    opacity: 1;
    transform: translateY(0);
}

.cta-text-col {
    flex: 1;
    color: #555;
    font-size: 1.1rem;
    line-height: 1.5;
    font-weight: 400;
    padding: 0 1rem;
    text-align: center;
    font-family: 'Obviously Narrow', sans-serif;
}

/* Animations for birds */
.cta-bird-left {
    left: 20px;
    opacity: 0;
    transform: translateX(-40px);
    transition: opacity 1.2s ease, transform 1.2s ease;
}

.cta-bird-right {
    right: 20px;
    opacity: 0;
    transform: translateX(40px);
    transition: opacity 1.2s ease, transform 1.2s ease;
}

.home-cta-section.animate-active .cta-bird-left {
    opacity: 1;
    transform: translateX(0);
}

.home-cta-section.animate-active .cta-bird-right {
    opacity: 1;
    transform: translateX(0);
}

.cta-bird {
    position: absolute;
    bottom: -50px;
    max-height: 500px;
    width: auto;
    z-index: 1;
    pointer-events: none;
    display: block;
}

/* MODALES */
.cta-modal {
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

.cta-modal-content {
    background-color: #FFF9FB;
    margin: 5% auto;
    padding: 2.5rem;
    border: 1px solid rgba(146, 131, 181, 0.1);
    width: 90%;
    max-width: 500px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(74, 53, 80, 0.15);
    position: relative;
    font-family: 'Obviously Narrow', sans-serif;
}

.cta-modal-close {
    position: absolute;
    right: 1.5rem;
    top: 1rem;
    color: #7e579b;
    font-size: 2rem;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.2s ease;
}

.cta-modal-close:hover {
    color: #000;
}

.modal-title {
    font-size: 1.8rem;
    font-weight: 800;
    margin-bottom: 2rem;
    text-align: center;
}

.purple-text { color: #7e579b; }
.pink-text { color: #e28fae; }

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
    margin-top: 1rem;
}

.btn-purple {
    background-color: #7e579b;
}
.btn-purple:hover {
    background-color: #6a4785;
}

.btn-pink {
    background-color: #e28fae;
}
.btn-pink:hover {
    background-color: #cf7fa0;
}

.form-message {
    margin-top: 1rem;
    text-align: center;
    font-size: 1.1rem;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 1024px) {
    .cta-bird {
        max-height: 380px;
    }
    .cta-bird-left {
        left: -40px;
    }
    .cta-bird-right {
        right: -40px;
    }
}

@media (max-width: 768px) {
    .home-cta-section {
        padding: 3rem 0;
    }
    
    .cta-pills-row {
        flex-direction: column;
        border-radius: 15px;
    }
    
    .cta-pill {
        padding: 1.2rem;
    }

    .cta-text-row {
        flex-direction: column;
        gap: 2rem;
        margin-top: 1rem;
    }

    .cta-bird {
        display: none;
    }
}
</style>

<script>
function openCtaModal(type) {
    const modal = document.getElementById('modal-' + type);
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closeCtaModal(type) {
    const modal = document.getElementById('modal-' + type);
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Cerrar al hacer clic fuera del modal
window.addEventListener('click', function(event) {
    if (event.target.classList.contains('cta-modal')) {
        event.target.style.display = 'none';
        document.body.style.overflow = '';
    }
});

function submitCtaForm(event, type) {
    event.preventDefault();
    const form = event.target;
    const messageDiv = form.querySelector('.form-message');
    const submitBtn = form.querySelector('.submit-btn');
    
    messageDiv.textContent = 'Enviando...';
    messageDiv.style.color = '#7e579b';
    submitBtn.disabled = true;

    const formData = new FormData(form);

    fetch('<?php echo admin_url("admin-ajax.php"); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            messageDiv.textContent = data.data.message;
            messageDiv.style.color = 'green';
            form.reset();
            setTimeout(() => {
                closeCtaModal(type);
                messageDiv.textContent = '';
            }, 2500);
        } else {
            messageDiv.textContent = data.data.message || 'Error al enviar el formulario.';
            messageDiv.style.color = 'red';
        }
    })
    .catch(error => {
        messageDiv.textContent = 'Error de conexión. Inténtalo de nuevo.';
        messageDiv.style.color = 'red';
    })
    .finally(() => {
        submitBtn.disabled = false;
    });
}

// Observador para animaciones al hacer scroll
document.addEventListener('DOMContentLoaded', function() {
    const ctaSection = document.querySelector('.home-cta-section');
    if (ctaSection && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    ctaSection.classList.add('animate-active');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        observer.observe(ctaSection);
    } else if (ctaSection) {
        // Fallback si no hay soporte para IntersectionObserver
        ctaSection.classList.add('animate-active');
    }
});
</script>
