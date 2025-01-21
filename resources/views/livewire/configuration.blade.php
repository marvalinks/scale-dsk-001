<div>
    <div class="row">
        <div class="col-md">
            <label for="otherNames" class="form-label">Connection Type</label>
            <select wire:model="connection" name="connection" class="form-control" required>
                <option value="">-choose-</option>
                <option value="comport">Port Connection (COMPORT)</option>
                <option value="network">TCP/IP Network</option>
            </select>
        </div>
    </div>
    <br>
    @if ($connection == 'comport')
    <div class="row">
        <div class="col-md">
            <label for="otherNames" class="form-label">PORT:</label>
            <input type="text" class="form-control" value="{{$config->port ?? ''}}" name="port" required />
        </div>
        <div class="col-md">
            <label for="lastName" class="form-label">SCRIPT:</label>
            <input type="text" class="form-control" id="" value="{{$config->script ?? ''}}" name="script" required />
        </div>
    </div>
    <br>
    @endif
    @if ($connection == 'network')
    <div class="row">
        <div class="col-md">
            <label for="" class="form-label">TCP/IP:</label>
            <input type="text" class="form-control" value="{{$config->ip ?? ''}}" name="ip" required />
        </div>
        <div class="col-md">
            <label for="" class="form-label">IP PORT:</label>
            <input type="text" class="form-control" id="" value="{{$config->ip_port ?? ''}}" name="ip_port" required />
        </div>
    </div>
    <br>
    @endif
</div>
