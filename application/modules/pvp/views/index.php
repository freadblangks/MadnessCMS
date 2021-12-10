    <section class="uk-section uk-section-xsmall uk-padding-remove slider-section">
      <div class="uk-background-cover uk-height-small header-section"></div>
    </section>
    <section class="uk-section uk-section-xsmall main-section" data-uk-height-viewport="expand: true">
      <div class="uk-container">
        <h4 class="uk-h4 uk-text-uppercase uk-text-bold"><i class="fas fa-fist-raised"></i> <?=$this->lang->line('tab_pvp_statistics');?></h4>
		<ul class="uk-subnav uk-subnav-pill" uk-switcher="connect: .pvp-statistics">
          <?php foreach ($realms as $charsMultiRealm): ?>
          <li><a href="#"><i class="fas fa-server"></i> <?= $this->wowrealm->getRealmName($charsMultiRealm->realmID); ?></a></li>
          <?php endforeach; ?>
        </ul>
        <ul class="uk-switcher pvp-statistics uk-margin-small">
          <?php foreach ($realms as $charsMultiRealm):
            $multiRealm = $this->wowrealm->getRealmConnectionData($charsMultiRealm->id);
          ?>
          <li>
            <div class="uk-grid uk-grid-small uk-child-width-1-1 uk-child-width-1-3@m" data-uk-grid>
            </div>
            <div class="uk-margin">
              <span class="uk-label uk-text-bold"><?=$this->lang->line('statistics_top_20');?></span>
              <div class="uk-overflow-auto uk-margin-small">
                <table class="uk-table dark-table uk-table-divider uk-table-small">
                  <thead>
                    <tr>
                      <th class="uk-table-expand"><i class="fas fa-user"></i> <?=$this->lang->line('table_header_name');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-user-tag"></i> <?=$this->lang->line('table_header_race');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-user-tag"></i> <?=$this->lang->line('table_header_class');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-flag"></i> <?=$this->lang->line('table_header_faction');?></th>
                      <th class="uk-table-expand uk-text-center"><i class="fas fa-info-circle"></i> <?=$this->lang->line('table_header_total_kills');?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($this->pvp_model->getTop20PVP($multiRealm)->result() as $tops): ?>
                      <tr>
                        <td class="uk-text-capitalize"><?= $tops->name ?></td>
                        <td class="uk-text-center"><img class="uk-border-rounded" src="<?= base_url('assets/images/races/'.$this->wowgeneral->getRaceIcon($tops->race)); ?>" width="20" height="20" title="<?= $this->wowgeneral->getRaceName($tops->race); ?>" alt="<?= $this->wowgeneral->getRaceName($tops->race); ?>"></td>
                        <td class="uk-text-center"><img class="uk-border-rounded" src="<?= base_url('assets/images/class/'.$this->wowgeneral->getClassIcon($tops->class)); ?>" width="20" height="20" title="<?= $this->wowgeneral->getClassName($tops->class); ?>" alt="<?= $this->wowgeneral->getClassName($tops->class); ?>"></td>
                        <td class="uk-text-center"><img class="uk-border-circle" src="<?= base_url('assets/images/factions/'.$this->wowgeneral->getFaction($tops->race).'.png'); ?>" width="20" height="20" title="<?= $this->wowgeneral->getFaction($tops->race); ?>" alt="<?= $this->wowgeneral->getFaction($tops->race); ?>"></td>
                        <td class="uk-text-center"><?= $tops->honor_stored_hk ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
