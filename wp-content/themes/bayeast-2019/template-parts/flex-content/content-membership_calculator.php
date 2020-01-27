<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>




<section class="flex-content membership-calculator container">
  <?php
    $sectionHeadine = get_sub_field('membership_calculator_headline');
    $sectionContent = get_sub_field('membership_calculator_content');
    $disclaimerContent = get_sub_field('membership_calculator_disclaimer_content');
  ?>

  <?php if (($sectionHeadine) || ($sectionContent)) : ?>
    <div class="calc-intro">
      <?php if ($sectionHeadine) : ?>
        <h2><?php echo $sectionHeadine; ?></h2>
      <?php endif; ?>

      <?php if ($sectionContent) :
        echo $sectionContent;
      endif; ?>
    </div>
  <?php endif; ?>



  <div class="calc-wrapper">

    <section class="main-left">
      <!-- <h1>Calculate your membership</h1> -->
      <form>
        <section>
          <p>Are you applying to be a REALTOR<sup>®</sup> or MLS only?
            <!-- <a href="#" data-tooltip="Please select either REALTOR® or MLS Only"></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">Please select either REALTOR® or MLS Only</span>
            </span>
          </p>
          <div class="options">
            <input type="radio" id="mls" name="mls" /> <label for="mls">REALTOR<sup>®</sup></label>
            <input type="radio" id="mls2" name="mls" /><label for="mls2">MLS ONLY</label>
            <input type="radio" class="default" name="mls3" value="0.00" checked />
          </div>
        </section>

        <section>
          <p>Do you want MLS Services?
            <!-- <a href="#" data-tooltip="MLS may not be required for membership"><i class="fas fa-info-circle"></i></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">MLS may not be required for membership</span>
            </span>
          </p>
          <div class="options">
            <input type="radio" id="mlsAccess" name="mlsAccess"><label for="mlsAccess"> YES</label>
            <input type="radio" id="mlsAccess2" name="mlsAccess"><label for="mlsAccess2">NO</label>
            <input type="radio" class="default" name="mlsAccess" value="0.00" checked />
          </div>
        </section>

        <section>
          <p>Do you want Key Services?
            <!-- <a href="#" data-tooltip="Access to the MLS is required to get a key"><i class="fas fa-info-circle"></i></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">Access to the MLS is required to get a key</span>
            </span>
          </p>
          <div class="options">
            <input type="radio" id="eKey" name="eKey"> <label for="eKey">YES</label>
            <input type="radio" id="eKey2" name="eKey"><label for="eKey2">NO</label>
            <input type="radio" class="default" name="eKey" value="0.00" checked />
          </div>
        </section>

        <section>
          <p>Do you want to make a $50 contribution to the REALTOR<sup>®</sup> Action Fund?
            <!-- <a href="#" data-tooltip="Optional – funds political advocacy"><i class="fas fa-info-circle"></i></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">Optional – funds political advocacy</span>
            </span>
          </p>
          <div class="options">
            <input type="radio" id="raf" name="raf"><label for="raf">YES</label>
            <input type="radio" id="raf2" name="raf" ><label for="raf2">NO</label>
            <input type="radio" class="default" name="raf" value="0.00" checked />
          </div>
        </section>

        <section>
          <p>For REALTORS<sup>®</sup> only:<br/>
            Do you want to sign up for Education Advantage?
            <!-- <a href="#" data-tooltip="Optional - Discounts to classes and a 5% discount at the REALTOR® Store"><i class="fas fa-info-circle"></i></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">Optional - Discounts to classes and a 5% discount at the REALTOR® Store</span>
            </span>
          </p>
          <div class="options">
            <input type="radio" id="education" name="education"><label for="education">YES</label>
            <input type="radio" id="education2" name="education" ><label for="education2">NO</label>
            <input type="radio" class="default" name="education" value="0.00" checked />
          </div>
        </section>

        <section>
          <p>Do you want to make a $35 contribution to the Bay East Foundation?
            <!-- <a href="#" data-tooltip="Optional – the Bay East Foundation is a charitable foundation helps both members and nonmembers"><i class="fas fa-info-circle"></i></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">Optional – the Bay East Foundation is a charitable foundation helps both members and nonmembers</span>
            </span>
          </p>
          <div class="options">
            <input type="radio" id="foundation" name="foundation"><label for="foundation">YES</label>
            <input type="radio" id="foundation2" name="foundation"><label for="foundation2">NO</label>
            <input type="radio" class="default" name="foundation" value="0.00" checked />
          </div>
        </section>

        <section>
          <p>When would you like to submit your application?
            <!-- <a href="#" data-tooltip="Dues are based on the month that you join the association"><i class="fas fa-info-circle"></i></a> -->
            <span class="tooltip">
              <i class="fas fa-info-circle"></i>
              <span class="tooltiptext">Dues are based on the month that you join the association</span>
            </span>
          </p>
          <div class="options date">
            <input type="text" id="datepicker" placeholder="Select Date"><i class="fas fa-calendar-alt"></i>
          </div>
        </section>
      </form>
    </section>
    <section class="main-right">
      <!-- <h1>What are the costs?</h1> -->
      <section class="pay-in-full">
        <h3>Pay in Full *</h3>

        <h4>REALTOR<sup>®</sup> Dues</h4>
          <div class="line-item"><label>NAR Dues:</label><span class="narDues"></span></div>
          <div class="line-item"><label>C.A.R Dues:</label><span class="carDues"></span></div>
          <div class="line-item"><label>Bay East Local Dues: </label><span class="bayEastDues"></span></div>
          <div class="line-item"><label>REALTOR<sup>®</sup> Initiation: </label><span class="realtorInit"></span></div>
          <div class="line-item"><label>C.A.R. Initiation Fee:</label><span class="carInit"></span></div>
          <!-- <div><label>REALTOR<sup>®</sup> Action Assessment:</label><span class="raa"></span><ref>$</ref></div>
          <div><label>C.A.R Issues Action Fee:</label><span class="iaf"></span><ref>$</ref></div> -->

        <h4>MLS Fees</h4>
        <div class="line-item"><label>MLS Fee: </label><span class="mls"></span></div>
        <div class="line-item"><label>MLS Initiation Fee: </label><span class="mlsInit"></span></div>

        <h4>Key Fees</h4>
        <div class="line-item"><label>eKey: </label><span class="eKey"></span></div>
        <div class="line-item"><label>SUPRA Initiation Fee: </label><span class="supraInit"></span></div>
        <!-- <div><label>XpressKey: </label><span class="xpressKey"></span><ref>$</ref></div>
        <div><label>XpressKey Deposit: </label><span class="xpressKeyDeposit"></span></div> -->


        <h4>Optional Fees</h4>
        <div class="line-item"><label>Education Advantage: </label><span class="education"></span></div>
        <div class="line-item"><label>Foundation Contribution: </label><span class="foundation"></span></div>
        <div class="line-item"><label>REALTOR<sup>®</sup> Action Fund: </label><span class="raf"></span></div>
        <div class="gross-total"><label>Total:</label><span class="total">0.00</span></div>
      </section>
      <section class="installment">
        <h3>Installment Plan (4 payments)</h3>
        <div class="line-item"><label>Installment #1</label><span class="inst1"></span></div>
        <div class="line-item"><label>Installment #2</label><span class="inst2"></span></div>
        <div class="line-item"><label>Installment #3</label><span class="inst3"></span></div>
        <div class="line-item"><label>Installment #4</label><span class="inst4"></span></div>
      </section>
    </section>


    <div class="disclaimer-content">
      <?php if ($disclaimerContent) :
        echo $disclaimerContent;
      endif; ?>
    </div>
  </div>

</section>
