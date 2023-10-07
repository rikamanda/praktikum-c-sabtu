#include <stdio.h>
#include <math.h>

int main(){
	// deklarasi variabel 
	float alas, tinggi, sisi_miring;
	
	// panjang alas dan tinggi
	alas = 4.0;
	tinggi = 5.0;
	
	// menghitung panjang sisi miring dengan rumus pythagoras 
	sisi_miring = sqrt (alas * alas + tinggi * tinggi);
	// menampilkan hasil 
	printf("panjang alas: %.2f cm/n", alas);
	printf("panjang tinggi: %.2f cm/n", tinggi);
	printf("rumus: a * a + t * t/n");
	printf("panjang sisi miring (hipotenusa): %.2f cm/n", sisi_miring);
	
	return 0;
}



