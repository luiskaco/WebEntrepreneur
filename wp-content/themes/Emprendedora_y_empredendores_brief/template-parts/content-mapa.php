<?php
/**
 * Mapa template part
 *
 * @package WordPress
 * @subpackage Empoderadas_Theme
 * @since 1.0.0
 */

// Evitar acceso directo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section id="mapa" data-screen-label="Mapa" style="padding:clamp(56px,8vw,90px) clamp(20px,6vw,56px); background:#FFF9FB; text-align:center;">
    <div class="eeReveal" style="max-width:1300px; margin:0 auto;">
      <p style="font-family:'Obviously Narrow',sans-serif; font-size:19px; margin:0 0 12px; font-weight:600; color:#7E579B; text-transform:uppercase; letter-spacing:1px;">Distribución del Evento</p>
      
      <!-- Separador decorativo con rombos -->
      <div style="display:flex; align-items:center; justify-content:center; gap:10px; margin:16px 0 24px;">
        <div style="width:4px; height:4px; background:#7E579B; transform:rotate(45deg);"></div>
        <div style="height:1.5px; background:rgba(126, 87, 155, 0.3); flex-grow:1; max-width:180px;"></div>
        <div style="width:8px; height:8px; background:#7E579B; transform:rotate(45deg);"></div>
        <div style="height:1.5px; background:rgba(126, 87, 155, 0.3); flex-grow:1; max-width:180px;"></div>
        <div style="width:4px; height:4px; background:#7E579B; transform:rotate(45deg);"></div>
      </div>
      
      <h2 style="font-family:'Obviously Narrow',sans-serif; font-weight:900; font-size:clamp(36px,5vw,52px); color:#4A3560; margin:0 0 40px; letter-spacing:1.5px; text-transform:uppercase;">Mapa de Stands</h2>
      
      <!-- Contenedor Flex para la Leyenda y el Mapa -->
      <!-- Contenedor Flex para el Mapa y Directorio -->

      <div class="eeMapContainer" style="align-items: flex-start;">
        
        <!-- MAPA con LEYENDA SUPERPUESTA -->
        <div style="flex:2.6; min-width:300px; display:flex; align-items:center; justify-content:center; box-sizing:border-box; position:relative;" class="eeMapCol">
          
          <!-- LEYENDA SUPERPUESTA -->
          <div class="eeLegendOverlay" style="position:absolute; top:20px; left:20px; z-index:10; max-width:240px; text-align:left; display:flex; flex-direction:column; padding:0; pointer-events:none;">
            <h3 style="display:flex; justify-content:space-between; width:100%; font-family:'Anton',sans-serif; font-weight:normal; font-size:clamp(32px, 4vw, 48px); color:#8F77B4; margin:0 0 12px; text-transform:uppercase; line-height:1; transform: scaleY(1.1); transform-origin: left bottom; pointer-events:auto;"><span>L</span><span>E</span><span>Y</span><span>E</span><span>N</span><span>D</span><span>A</span></h3>
            
            <div style="background:#E18EBB; padding:20px 16px; border-radius:0; box-shadow:0 8px 24px rgba(74,53,80,0.15); pointer-events:auto;">
              <div style="display:flex; flex-direction:column; gap:20px;">
                
                <!-- Escenario -->
                <div style="display:flex; align-items:center; gap:16px;">
                  <div style="width:24px; height:18px; background:#F3E2C6; flex-shrink:0;"></div>
                  <span style="font-family:'Obviously Narrow',sans-serif; font-size:14px; font-weight:700; color:#fff; letter-spacing:0.5px; text-transform:uppercase;">Escenario</span>
                </div>
                
                <!-- Zona Jardín -->
                <div style="display:flex; align-items:center; gap:16px;">
                  <div style="width:24px; height:18px; background:repeating-linear-gradient(45deg, #a4b3e6, #a4b3e6 4px, #8699d6 4px, #8699d6 8px); flex-shrink:0;"></div>
                  <span style="font-family:'Obviously Narrow',sans-serif; font-size:14px; font-weight:700; color:#fff; letter-spacing:0.5px; text-transform:uppercase;">Zona Jardín</span>
                </div>
                
                <!-- Zona Pabellón -->
                <div style="display:flex; align-items:center; gap:16px;">
                  <div style="width:24px; height:18px; background:repeating-linear-gradient(45deg, #fff, #fff 4px, rgba(255,255,255,0.7) 4px, rgba(255,255,255,0.7) 8px); flex-shrink:0;"></div>
                  <span style="font-family:'Obviously Narrow',sans-serif; font-size:14px; font-weight:700; color:#fff; letter-spacing:0.5px; text-transform:uppercase;">Zona Pabellón</span>
                </div>
                
              </div>
            </div>
          </div>

          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/mapa-eme.webp' ); ?>" alt="Mapa del evento" style="max-width:100%; height:auto; display:block; border-radius:16px;" />
        </div>

        <!-- DIRECTORIO DE MARCAS (Derecha) -->
        <div style="flex:1; min-width:300px; max-width:450px; text-align:left; display:flex; flex-direction:column; padding:10px 10px 10px 20px; border-left:1px solid rgba(74,53,80,0.1); box-sizing:border-box;" class="eeLegendCol">
          
          <div style="text-align:center; margin-bottom:16px;">
            <div style="display:flex; align-items:center; justify-content:center; gap:8px;">
              <div style="width:5px; height:5px; background:#E595BB; transform:rotate(45deg);"></div>
              <div style="height:1.5px; background:#E595BB; flex-grow:1;"></div>
              <h3 style="font-family:'Bernard MT', 'Cormorant Garamond', serif; font-weight:bold; font-size:32px; color:#E595BB; margin:0 12px; text-transform:none;">Marcas</h3>
              <div style="height:1.5px; background:#E595BB; flex-grow:1;"></div>
              <div style="width:5px; height:5px; background:#E595BB; transform:rotate(45deg);"></div>
            </div>
          </div>

          <!-- BUSCADOR -->
          <div style="margin-bottom: 16px;">
            <input type="text" id="eeBrandSearch" placeholder="Buscar marca..." style="width:100%; padding:10px 16px; border:1.5px solid rgba(225, 142, 187, 0.5); border-radius:8px; font-family:'Oswald',sans-serif; font-size:16px; color:#4A3560; outline:none; box-sizing:border-box; background:#fff; transition:border 0.3s ease;" onfocus="this.style.borderColor='#E18EBB'" onblur="this.style.borderColor='rgba(225, 142, 187, 0.5)'">
          </div>

          <!-- CONTENEDOR CON SCROLL -->
          <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px 16px; font-family:'Oswald',sans-serif; font-size:13.5px; line-height:1.1; color:#4A3560; max-height: 480px; overflow-y: auto; padding-right:10px; align-content:start;" id="eeBrandGrid">
            <?php
            $marcas_lista = array(
              "Asmi", "Macarons By Andrea", "Voluntarios", "Toscana", "Rulfa", 
              "Miel de Abeja", "Kantu + Hecho", "Jumbis", "La Petite Butterfly", 
              "Sara Handmade", "Origami Perú", "Macaroti + Mina", "Alces Aventura", 
              "Dulzura Clandestina", "SOMOS", "Flor de Cerezo", "Lanamali", 
              "Alta Costura", "Cosmeticos Belleza", "Mima spa centro", 
              "La mujerona Boutique", "Rina Cafe", "Lía y lola Papelería", 
              "Pilar y sus postres", "LH Accesorios", "Amelica", "ChocoAle", 
              "AWKI", "Pasteleria", "La Cebra", "Vittoria", "Carolina Young", 
              "Yulisa's Ice Cream", "Jazmin de Azahara", "Ymbabura perú", 
              "Hilo el rey", "Aina", "Muki", "Mistura Cerámica", "Coral Cre",
              "Envíos estudios", "Mediumscrema", "Valari", "Caca Coco swimwear", 
              "Lulita Miracoles", "Mitty multi store", "Abyanta", "Alanna", 
              "Ouni", "Monina Minis", "Sinca", "Cayetana", "Aina Fit", "Moda Fit", 
              "Amarre", "Naturalmente", "Bocanero coffe", "StoryTelling mpi", 
              "Lilolatta", "Moda Jane fina", "Camila y Ana", "Vitral Kelly",
              "Joyería", "Fly style", "True Handmade", "Fantasia", "Libros underwear", 
              "Yumi Ru", "Alomy", "Yolis / Azulca", "Bredel", "Alma Aneja", 
              "Bebé", "Madre Selva", "Linda carteras", "Casa Sira", "ARUMAK"
            );
            
            foreach($marcas_lista as $index => $marca) {
                $num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                echo '<div class="ee-brand-item" style="display:flex; align-items:flex-start; gap:8px;">';
                echo '<div style="background:#E18EBB; color:#fff; width:22px; height:22px; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:bold; border-radius:3px; flex-shrink:0;">' . $num . '</div>';
                echo '<span class="ee-brand-name" style="padding-top:3px;">' . esc_html($marca) . '</span>';
                echo '</div>';
            }
            ?>
          </div>
        </div>
      </div>
      
      <!-- SCRIPT PARA EL BUSCADOR -->
      <script>
      document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('eeBrandSearch');
        if(searchInput) {
          searchInput.addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            const items = document.querySelectorAll('#eeBrandGrid .ee-brand-item');
            items.forEach(item => {
              const name = item.querySelector('.ee-brand-name').textContent.toLowerCase();
              // Si el nombre incluye el texto, mostramos. Si no, ocultamos.
              if(name.includes(term)) {
                item.style.display = 'flex';
              } else {
                item.style.display = 'none';
              }
            });
          });
        }
      });
      </script>

    </div>
    
    <style>
      /* Scrollbar personalizado para el Directorio de Marcas */
      #eeBrandGrid::-webkit-scrollbar {
        width: 6px;
      }
      #eeBrandGrid::-webkit-scrollbar-track {
        background: rgba(225, 142, 187, 0.15);
        border-radius: 4px;
      }
      #eeBrandGrid::-webkit-scrollbar-thumb {
        background: #E18EBB;
        border-radius: 4px;
      }
      #eeBrandGrid::-webkit-scrollbar-thumb:hover {
        background: #C773A1;
      }

      .eeMapContainer {
        display:flex; 
        flex-direction:row; 
        align-items:stretch; 
        justify-content:center; 
        gap:32px; 
        flex-wrap:wrap; 
        background:#fff; 
        border-radius:32px; 
        padding:20px; 
        box-shadow:0 20px 40px rgba(74,53,80,0.08); 
        box-sizing:border-box;
      }
      @media (max-width: 1024px) {
        .eeMapContainer {
          padding: 24px 16px !important;
          gap: 24px !important;
          border-radius: 20px !important;
        }
        .eeLegendCol {
          border-right: none !important;
          border-bottom: 1px solid rgba(74,53,80,0.1);
          padding-bottom: 24px !important;
          margin-bottom: 8px !important;
          max-width: 100% !important;
          width: 100% !important;
        }
        .eeMapCol {
          width: 100% !important;
          min-width: 100% !important;
          flex-direction: column !important;
        }
        .eeLegendOverlay {
          position: relative !important;
          top: auto !important;
          left: auto !important;
          max-width: 100% !important;
          margin-bottom: 24px !important;
        }
      }
    </style>
</section>
