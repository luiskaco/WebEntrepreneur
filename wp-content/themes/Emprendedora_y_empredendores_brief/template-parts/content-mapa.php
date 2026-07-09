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
              <h3 style="font-family:'Obviously Narrow', sans-serif; font-weight:bold; font-size:32px; color:#E595BB; margin:0 12px; text-transform:none;">Marcas</h3>
              <div style="height:1.5px; background:#E595BB; flex-grow:1;"></div>
              <div style="width:5px; height:5px; background:#E595BB; transform:rotate(45deg);"></div>
            </div>
          </div>

          <!-- BUSCADOR -->
          <div style="margin-bottom: 16px;">
            <input type="text" id="eeBrandSearch" placeholder="Buscar marca..." style="width:100%; padding:10px 16px; border:1.5px solid rgba(225, 142, 187, 0.5); border-radius:8px; font-family:'Obviously Narrow',sans-serif; font-size:16px; color:#4A3560; outline:none; box-sizing:border-box; background:#fff; transition:border 0.3s ease;" onfocus="this.style.borderColor='#E18EBB'" onblur="this.style.borderColor='rgba(225, 142, 187, 0.5)'">
          </div>

          <!-- CONTENEDOR CON SCROLL: dos columnas verticales (01-52 | 53-677) -->
          <?php
          $marcas_col_a = array(
            '01' => 'Kami',
            '02' => 'Marjorie Ascorbe',
            '03' => 'Velaroma',
            '04' => 'Terrana',
            '05' => 'Fialle',
            '06' => 'Man-do Basic / Velaz luz y alma',
            '07' => 'Kuntu / Hecho a mano',
            '08' => 'Aurelia',
            '09' => 'La Petite butterfly',
            '10' => 'Sara Handmade',
            '11' => 'Origen Perú',
            '12' => 'Mazarah + Alma',
            '13' => 'Moss Terrarium',
            '14' => 'Balsamo / Doménica',
            '15' => 'SCHÄTZE',
            '16' => 'Flor de cerezo',
            '17' => 'Lovandí',
            '18' => 'Alba Clothes',
            '19' => 'Louboutanicals / Cristalkind',
            '20' => 'Wine spa centro corporal',
            '21' => 'La mujerona Boutique',
            '22' => 'Nina Sole',
            '23' => 'Ele y Ale Papelería',
            '24' => 'Pilar y sus postres de casa',
            '25' => 'LF Accesorios',
            '26' => 'Dalcello',
            '27' => 'Sheycute',
            '28' => 'Ininti / Samaynusta',
            '29' => 'Pao Bedoya Velazquez',
            '30' => 'La Cabra',
            '31' => 'Gitana',
            '32' => 'Hecho por Carolina Young',
            '33' => 'Volans Fine jewerly',
            '34' => 'Jasmine Fashion',
            '35' => 'Yerbalivio peru',
            '36' => 'Bites of Joy',
            '37' => 'Aura',
            '38' => 'Muki',
            '39' => 'Matsuda cerámica',
            '40' => 'Casa Lira',
            '41' => 'AM/PM',
            '42' => 'Kunanmi',
            '43' => 'Benedetta',
            '44' => 'Subtecarteras',
            '45' => 'Petalia / Origen neutro',
            '46' => 'Remax',
            '47' => 'Zero',
            '48' => 'Herrera cultura y joyería / Nomada Natural',
            '49' => 'Mila Bonita',
            '50' => 'Angel de Canela',
            '51' => 'Zeekay Fashion',
            '52' => 'Sissi Jewerly',
          );
          $marcas_col_b = array(
            '53' => 'Eviext estudios y vida en el extranjero',
            '54' => 'Modomacarena',
            '55' => 'Yolett',
            '56' => 'Casa Coco swinwear',
            '57' => 'Leddu Minerales',
            '58' => 'Matty multistore',
            '59' => 'Mayanto',
            '60' => 'Alzana',
            '61' => 'Ilaini',
            '62' => 'Marina Mora Escuela',
            '63' => '5inco fashionwear',
            '64' => 'Signature',
            '65' => 'Ame',
            '66' => 'Maria Fé',
            '67' => 'Amarra',
            '68' => 'Naturalmente Gourmet y crea detalles',
            '69' => 'Baumann coffe',
            '70' => 'Mary Rodriguez / Pakasqa',
            '71' => 'Literaria',
            '72' => 'Madu / Maria Jose fina',
            '73' => 'Gomitas funcionales',
            '74' => 'Vitamin Party',
            '75' => 'Joyeria Fiorella',
            '76' => 'Fly style',
            '77' => 'Thak Handmade art',
            '78' => 'Farmasi',
            '79' => 'Libra underwear',
            '80' => 'Vainilla',
            '81' => 'Glowy',
            '82' => 'Voila / Anima',
            '83' => 'Rivellé',
            '84' => 'Alma Bruja',
            '85' => 'Breshó',
            '86' => 'Madre Selva',
            '87' => 'Liminal carteras',
            '88' => 'Casa Siu',
            '89' => 'MR White brand',
            '90' => 'Amaranta',
            '91' => 'Árgea',
            '92' => 'Mia Lola',
            '93' => 'Amaretti',
            '94' => 'Puzzle / iscl foods',
            '95' => 'Amonita Studio',
            '96' => 'Vatina Candles',
            'A'  => 'Somos Sebas y Pao',
            'B'  => 'Casa Bella',
            'C'  => 'Vaka',
            'D'  => 'Anyo accesorios',
            'E'  => 'Olivae',
            '677'=> 'El balcón de las flores',
          );

          // Función helper para renderizar un ítem de marca
          function ee_render_brand_item( $id, $nombre ) {
              echo '<div class="ee-brand-item" style="display:flex; align-items:flex-start; gap:8px; margin-bottom:10px;">';
              echo '<div style="background:#E18EBB; color:#fff; min-width:36px; height:30px; display:flex; align-items:center; justify-content:center; font-family:\'Acumin Variable Concept\',sans-serif; font-size:17px; font-weight:800; border-radius:4px; flex-shrink:0; padding:0 5px; letter-spacing:0; line-height:1; padding-top:2px;">' . esc_html($id) . '</div>';
              echo '<span class="ee-brand-name" style="padding-top:6px; font-family:\'Obviously Narrow\',sans-serif; font-size:13.5px; line-height:1.25; color:#4A3560;">' . esc_html($nombre) . '</span>';
              echo '</div>';
          }
          ?>

          <div id="eeBrandGrid" style="display:flex; gap:16px; max-height:480px; overflow-y:auto; padding-right:8px;">

            <!-- Columna A: 01 – 52 -->
            <div class="ee-brand-col" style="flex:1; display:flex; flex-direction:column;">
              <?php foreach ( $marcas_col_a as $id => $nombre ) { ee_render_brand_item( $id, $nombre ); } ?>
            </div>

            <!-- Columna B: 53 – 677 -->
            <div class="ee-brand-col" style="flex:1; display:flex; flex-direction:column;">
              <?php foreach ( $marcas_col_b as $id => $nombre ) { ee_render_brand_item( $id, $nombre ); } ?>
            </div>

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
