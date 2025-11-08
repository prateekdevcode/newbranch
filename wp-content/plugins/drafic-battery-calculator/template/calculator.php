<div class="calculator-col calculator-form">
  <div id="calculator-block">
      <div>
          <label for="calculator-power">Electric power in kVA</label>
            <input id="calculator-power" type="number" value="500">
            <p class="message"></p>
        </div>
    <div>
          <label for="calculator-load">Load %</label>
            <input id="calculator-load" type="number" value="100" max="100">
            <p class="message"></p>
        </div>
    <div>
      <label for="calculator-pow-factor">Power Factor</label>
            <input id="calculator-pow-factor" type="number" value="0.8" max="1.0" step="0.01">
            <p class="message"></p>
        </div>
    <div>
      <label for="calculator-efficiency">Efficiency %</label>
            <input id="calculator-efficiency" type="number" value="90" max="100" >
            <p class="message"></p>
        </div>
        <div>
      <label for="calculator-cells">Number of Cells/String</label>
            <input id="calculator-cells" type="number" value="240">
            <p class="message"></p>
        </div>
        
        <div>
          <label for="calculator-battery-strings">Number of battery strings</label>
            <input id="calculator-battery-strings" type="number" value="4">
            <p class="message"></p>
        </div>
        <div>
      <label for="calculator-time">Operating Time</label>
            <select id="calculator-time">
              <?php for($i = 1; $i<=15; $i++ ) : ?>  
            <option value="<?php echo $i; ?>" <?php echo $i == 10 ? 'selected' : ''; ?>><?php echo $i; ?></option>
        <?php endfor; ?>
          <option value="20">20</option>
          <option value="30">30</option>
            </select>
        </div>
        <button type="button" id="calculator-button" >Calculate</button>
	  	<p id="calculator-result"></p>
    </div>
</div>

<div class="calculator-col result">
	<div class="calculator-warning">
		Product that meets your requirements cannot be found. Please contact us for a solution to this problem.
	</div>
	<div id="calculator-recommended">
		<h3>We recommend the following model(s):</h3>
		<div id="recommended-items">
			
		</div>
	</div>
  	<table id="calculator-table">
      <thead>
          <tr>
              <th rowspan="2">Model</th>
              <th colspan="17">Operating Time to End Point Voltage (in minutes)</th>
          </tr>
          <tr>
          <?php for($i = 1; $i<=15; $i++ ) : ?>
              <th><?php echo $i; ?></th>
          <?php endfor; ?>
          <th>20</th>
          <th>30</th>
          </tr> 
    </thead>
    <tbody>
      <?php $products = wc_get_products(array(
        'status' => 'publish',
        'limit' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'category' => array( 'battery-calculator' ),
    ) ); ?>
      <?php foreach( $products as $product ) : ?>
      <tr>  
        <td data-id="<?php echo $product->get_id(); ?>"><a href="<?php echo get_permalink( $product->get_id() ) ?>" class="<?php $product_id = $product->get_id(); $terms = get_the_terms( $product_id , 'product_cat' );
            if ( !empty( $terms ) ) { foreach ( $terms as $term ) {
        			echo $term->name; } } ?>"><?php echo $product->get_name(); ?> </a></td> 
        <?php for($i = 1; $i<=15; $i++ ) : ?>
          <td><?php echo get_post_meta($product->get_id(), '_operating_time_'.$i, true ); ?></td> 
        <?php endfor; ?>
        <td><?php echo get_post_meta($product->get_id(), '_operating_time_20', true ); ?></td>
        <td><?php echo get_post_meta($product->get_id(), '_operating_time_30', true ); ?></td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>  
</div>