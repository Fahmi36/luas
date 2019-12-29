              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">Data Luas Tanah</h4>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover" id="datakontak">
                      <thead class="text-warning">
                        <th>No</th>
                        <th>Alamat</th>
                        <th>Luas</th>
                        <th>Aksi</th>
                      </thead>
                      <tbody>
                        <?php $no = 1; foreach ($datanya as $key): ?>
                        <tr>

                          <td><?=$no++?></td>
                          <td><?=$key->alamat?></td>
                          <td><?=$key->luas?></td>
                          <td class="td-actions">
                            <a href="<?= site_url('editlahan/').$key->id ?>" type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                              <i class="material-icons">edit</i>
                            </a>
                            <a onclick="removedatalahan(<?=$key->id?>)" type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                              <i class="material-icons">close</i>
                            </a>
                          </td>
                        </tr>
                          <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>