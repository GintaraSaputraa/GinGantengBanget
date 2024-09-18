
<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="form-group mb-3>
                <label for="hero" class="form-label">Tulis Hero ML</label>
                <input type="text" name="hero" id="hero" class="form-control mb-3">
                <button type="submit" class="btn btn-primary" id="getHeroBtn">Tambah Data</button>
            </div>
            <h3>Hero Dipilih: <span id="hero_dipilih"></span></h3>
            <div class="table-responsive">
                <table class="table table-hover" id="heroTable">
                    <thead>
                        <tr>
                            <th>Hero ID</th>
                            <th>Nama Hero</th>
                            <th>Gambar Hero</th>
                            <th>Hero Role</th>
                            <th>Hero Specially</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('partials.script')

    <script>
    $(document).ready(function() {
        
        
        $("#getHeroBtn").click(function() {
            var heroName = $('#hero').val();
            console.log('Hero: ' + heroName);
        $.ajax({
            url: '/heroml/check',
            method: 'get',
            data: {
                heroName: heroName
            },
            success: function(response) {
                console.log(response);
                if (response.success) {
                    var hero = response.hero[0];

                    var tableRow = `
                    <tr>
                        <td>${hero.hero_id}</td>
                        <td>${hero.hero_name}</td>
                        <td><img src="${hero.hero_avatar}" width="50"></td>
                        <td>${hero.hero_role}</td>
                        <td>${hero.hero_specially}</td>
                    </tr>`;

                    $("#heroTable tbody").html(tableRow);
                    $("#heroTable").show();

                    $("#hero_dipilih").html(hero.hero_name);
                    $("#hero_dipilih").show();
                } else {
                    alert("No Hero found.");
                }
            },
            error: function() {
                console.log('error?');
                alert("Error retrieving hero details.");
            }
        })
    });


}) </script>
</body>
</html>