#include<stdio.h>

int main() {
	int A[11]; // membuat array dengan 11 elemen 
	int data[] = {12, 15, 7, 10, 5, 2, 17, 25, 9, 20, 35,};
	int i, j = 0;
	
	// menginput data dan menyimpan nilai genap ke dalam array A
	printf("data dalam dokumen:\n");
	for (i = 0; i < 11; i++) {
		printf("%d ", data[i]); // mencetak data satu per satu
		if (data [i] % 2 == 0) {
			A{j} = data {i};
			j++; 
		}
	}
	
	// mencetak isi array A
	prinft("\nIsi array A: ");
	for (i = 0, i < j; i++) {
		printf ("%d ", A [i]); 
	}
	printf("\n");
	
	return 0;
}

