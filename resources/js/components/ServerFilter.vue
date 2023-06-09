<template>
    <div>
      <h2>{{ $t('filter') }}</h2>
      <div class="filter-item">
        <label for="storage">{{ $t('name') }}:</label>
        <input type="range" id="storage" v-model="selectedStorage" min="0" max="11" step="1" @input="applyFilters" />
        <span>{{ storageOptions[selectedStorage] }}</span>
      </div>
      <div class="filter-item">
        <label>{{ $t('ram') }}:</label>
        <div v-for="ram in ramOptions" :key="ram">
          <input type="checkbox" :id="ram" :value="ram" v-model="selectedRam" @change="applyFilters" />
          <label :for="ram">{{ ram }}</label>
        </div>
      </div>
      <div class="filter-item">
        <label>{{ $t('harddisk_type') }}:</label>
        <select v-model="selectedHarddiskType" @change="applyFilters">
          <option value="">{{ $t('all') }}</option>
          <option value="SAS">SAS</option>
          <option value="SATA">SATA</option>
          <option value="SSD">SSD</option>
        </select>
      </div>
      <div class="filter-item">
        <label>{{ $t('location') }}:</label>
        <select v-model="selectedLocation" @change="applyFilters">
          <option value="">{{ $t('all') }}</option>
          <option v-for="location in locations" :key="location.code" :value="location.code">{{ location.name }}</option>
        </select>
      </div>
    </div>
  </template>

<script>
    export default {
        data() {
            return {
                selectedStorage: 0,
                selectedRam: [],
                selectedHarddiskType: "",
                selectedLocation: "",
                storageOptions: [
                "0",
                "250GB",
                "500GB",
                "1TB",
                "2TB",
                "3TB",
                "4TB",
                "8TB",
                "12TB",
                "24TB",
                "48TB",
                "72TB",
                ],
                ramOptions: [
                "2GB",
                "4GB",
                "8GB",
                "12GB",
                "16GB",
                "24GB",
                "32GB",
                "48GB",
                "64GB",
                "96GB",
                ],
                locations: [],
            };
        },
        mounted() {
            this.fetchLocations();
        },
        methods: {
            async fetchLocations() {
                try {
                    const response = await fetch('/api/v1/locations');
                    const data = await response.json();
                    this.locations = data.data;
                } catch (error) {
                    console.error('Error retrieving locations:', error);
                }
            },
            applyFilters() {
                const filters = {};

                if (this.selectedStorage) {
                    filters.storage = this.storageOptions[this.selectedStorage];
                }

                if (this.selectedRam?.length) {
                    filters.ram = this.selectedRam;
                }

                if (this.selectedHarddiskType) {
                    filters.harddiskType = this.selectedHarddiskType;
                }

                if (this.selectedLocation) {
                    filters.location = this.selectedLocation;
                }

                this.$emit('apply-filters', filters);
                console.log(filters);
            },
        },
    };
</script>
