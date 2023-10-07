#include<stdio.h>


int main() 
{
	
	// deklarasi variabel
	float sisi_alas, tinggi, luas, keliling;
	
	// meminta input panjang sisi alas segitiga (dalam cm)
	printf("Masukkan panjang sisi alas segitiga (cm): ");
	scanf("%f", &sisi_alas);
	
	// meminta input tinggi segitiga (dalam cm)
	printf("Masukkan tinggi segitiga (cm): ");
	scanf("%f", &tinggi);
	
	// menghitung luas segitiga 
	luas = 0,5 *sisi_alas * tinggi;
	
	// menghitung keliling segitiga
	keliling = 3 * sisi_alas;
	
	// menampilkan hasil
	printf("luas segitiga: %.2f cm^2\n", luas);
	printf("keliling segitiga: %.2f cm\n", keliling);
	
	return 0;
}
	
