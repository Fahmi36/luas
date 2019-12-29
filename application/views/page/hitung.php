              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">Data Luas Tanah</h4>
                  </div>
                  <div class="card-body">
                    <form method="post" action="javascript:void(0)" id="kirimpolygon">
                      <div class="card-body">
                        <p id="tampilkan"></p>
                        <div id="mapsnya" style="height:400px;margin-bottom:20px;background: #FFF;padding: 10px;border:solid 1px #DDD"></div>
                      <div class="form-group label-floating has-success">
                        <label class="control-label">Luas Tanah</label>
                        <input type="text" name="luas" id="luas" class="form-control" />
                        <span class="form-control-feedback">
                          M<sup>2</sup>
                        </span>
                      </div>
                      <div class="form-group label-floating has-success">
                        <label class="control-label">Luas Tanah HA</label>
                        <input type="text" name="luasha" id="luasha" class="form-control" />
                        <span class="form-control-feedback">
                          Hektar<sup>2</sup>
                        </span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat"></textarea>
                      </div>
                      <div class="form-group" style="display: none;">
                        <label for="exampleInputPassword1">polygon</label>
                        <textarea class="form-control" name="polygon" id="polygon"></textarea>
                      </div>
                      <div class="form-group" style="display: none;">
                        <label for="exampleInputPassword1">lat</label>
                        <input type="text" name="lat" id="lat" class="form-control" />
                      </div>
                      <div class="form-group" style="display: none;">
                        <label for="exampleInputPassword1">long</label>
                        <input type="text" name="long" id="long" class="form-control" />
                      </div>
                      <div class="form-group">
                      <label class="label-alamat">Kota</label>
                      <select id="sel_kota" name="sel_kota" class="form-control"></select>
                    </div>
                    <div class="form-group">
                      <label class="label-alamat">Kecamatan</label>
                      <select id="sel_kec" name="sel_kec" class="form-control"></select>
                    </div>
                    <div class="form-group">
                      <label class="label-alamat">Kelurahan</label>
                      <select id="sel_desa" name="sel_desa" class="form-control"></select>
                    </div>
                    <input type="hidden" id="idkab" name="idkab">
                    <input type="hidden" id="idkec" name="idkec">
                    <input type="hidden" id="iddesa" name="iddesa">
                    <input type="hidden" id="namekab" name="namekab">
                    <input type="hidden" id="namekec" name="namekec">
                    <input type="hidden" id="namedesa" name="namedesa">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>