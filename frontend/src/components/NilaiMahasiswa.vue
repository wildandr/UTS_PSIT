<template>
    <div class="nilai-mahasiswa-container">
      <h1>Daftar Nilai Mahasiswa</h1>
      <table class="nilai-table">
        <thead>
          <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="nilai in nilaiMahasiswa" :key="nilai.id_perkuliahan">
            <td>{{ nilai.nim }}</td>
            <td>{{ nilai.nama }}</td>
            <td>{{ nilai.nama_mk }}</td>
            <td>{{ nilai.nilai }}</td>
            <td>
              <button @click="updateNilai(nilai)" class="btn-action">Update</button>
              <button @click="deleteNilai(nilai.nim, nilai.kode_mk)" class="btn-action btn-hapus">Hapus</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <div class="form-container">
        <h2>Masukkan Nilai Baru</h2>
        <div class="form-input">
          <input type="text" v-model="nim" placeholder="NIM">
        </div>
        <div class="form-input">
          <input type="text" v-model="kodeMk" placeholder="Kode MK">
        </div>
        <div class="form-input">
          <input type="number" v-model="nilaiBaru" placeholder="Nilai">
        </div>
        <button @click="insertNilai" class="btn-simpan">Simpan</button>
      </div>
  
      <div class="form-container">
        <h2>Update Nilai Mahasiswa</h2>
        <div class="form-input">
          <input type="text" v-model="nimUpdate" placeholder="NIM">
        </div>
        <div class="form-input">
          <input type="text" v-model="kodeMkUpdate" placeholder="Kode MK">
        </div>
        <div class="form-input">
          <input type="number" v-model="nilaiUpdate" placeholder="Nilai Baru">
        </div>
        <button @click="updateNilai" class="btn-update">Update</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        nilaiMahasiswa: [],
        nim: '',
        kodeMk: '',
        nilaiBaru: '',
        nimUpdate: '',
        kodeMkUpdate: '',
        nilaiUpdate: ''
      };
    },
    mounted() {
      this.getAllNilaiMahasiswa();
    },
    methods: {
      getAllNilaiMahasiswa() {
        axios.get('http://localhost:8000/api/nilai-mahasiswa')
          .then(response => {
            this.nilaiMahasiswa = response.data;
          })
          .catch(error => {
            console.error('Error fetching data:', error);
          });
      },
      insertNilai() {
        axios.post(`http://localhost:8000/api/nilai-mahasiswa/${this.nim}`, {
          kode_mk: this.kodeMk,
          nilai: parseFloat(this.nilaiBaru)
        })
        .then(response => {
          console.log('Nilai berhasil dimasukkan:', response.data);
          this.getAllNilaiMahasiswa();
        })
        .catch(error => {
          console.error('Error inserting data:', error);
        });
      },
      updateNilai(nilai) {
        this.nimUpdate = nilai.nim;
        this.kodeMkUpdate = nilai.kode_mk;
        this.nilaiUpdate = nilai.nilai;
      },
      saveUpdate() {
        axios.put(`http://localhost:8000/api/nilai-mahasiswa/${this.nimUpdate}/${this.kodeMkUpdate}`, {
          nilai: parseFloat(this.nilaiUpdate)
        })
        .then(response => {
          console.log('Nilai berhasil diupdate:', response.data);
          this.getAllNilaiMahasiswa();
          this.clearUpdateFields();
        })
        .catch(error => {
          console.error('Error updating data:', error);
        });
      },
      clearUpdateFields() {
        this.nimUpdate = '';
        this.kodeMkUpdate = '';
        this.nilaiUpdate = '';
      },
      deleteNilai(nim, kodeMk) {
        axios.delete(`http://localhost:8000/api/nilai-mahasiswa/${nim}/${kodeMk}`)
          .then(response => {
            console.log('Nilai berhasil dihapus:', response.data);
            this.getAllNilaiMahasiswa();
          })
          .catch(error => {
            console.error('Error deleting data:', error);
          });
      }
    }
  };
  </script>
  
  <style scoped>
  .nilai-mahasiswa-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  
  h1 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .nilai-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .nilai-table th, .nilai-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  
  .btn-action {
    padding: 6px 10px;
    font-size: 14px;
    margin-right: 5px;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
  }
  
  .btn-hapus {
    background-color: #dc3545;
  }
  
  .btn-simpan {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
  }
  
  .btn-update {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #ffc107;
    color: #fff;
    border: none;
    border-radius: 4px;
  }
  </style>
  