<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <!-- <router-link 
                :to="{ name:'resi.create'}"
                class="btn btn-primary btn-sm rounded shadow mb-3"
                >Add Resi</router-link> -->

                <div class="card rounded shadow">
                    <div class="card-header">
                        Transaction List
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Nama</th>
                                <th>Nomor Resi</th>
                                <th>Jumlah</th>
                            </thead>
                            <tbody>
                                <td>Alexander</td>
                                <td>52131231121</td>
                                <td>1</td>
                                <td>
                                    <!-- <div class="btn-group">
                                        <RouterLink
                                         :to="{ name: 'resi.edit',params:{id:1}}"
                                        ></RouterLink>
                                    </div> -->
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
