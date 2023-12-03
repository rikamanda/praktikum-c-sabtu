#include <stdio.h>

int main() {
	
	double saldo = 1000000.0;
	
	double bunga = 0.02;
	
	int jumlahbulan = 10;
	
	int bulan;
	for ( bulan = 1; bulan <= jumlahBulan; ++bulan) {
		
		double bungaBulanini = saldo * bunga;
		
		
		saldo += bungaBulanini;
	}
	
		
	printf("jumlah uang setelah %d bulan: Rp. %.2f\n", jumlahBulan, saldo);
	
	return 0;	
}
