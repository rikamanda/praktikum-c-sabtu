#include<stdio.h>

int main() {
	int nilai[10]; // membuat array dengan 10 elemen untuk menyimpan nilai mahasiswa
	int i;
	
	// memasukan nilai mahasiswa ke dalam array 
	printf("masukan 10 nilai mahasiswa: \n");
	for (i = 0; i < 10; i++)	 {
		printf("nilai mahasiswa ke-%d: ", i + 1);
		scanf("%d", &nilai[i]);
		
	}
	
	//menctak nilai mahasiswa yang lulus >= 60)
	printf("\Daftra nailai mahasiswa yang lulus: \n"); 
	for (i = 0; i < 10; i++) {
		if (nilai [i] >= 60) {
			printf("nilai mahasiswa ke-%d: %d\n", i + 1, nilai[i]);
			
		}
	}
	
	return 0;

}
