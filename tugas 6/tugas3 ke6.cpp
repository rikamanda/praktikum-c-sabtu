#include <stdio.h>

int main() {
	int i,value = 1;
	
	for (i = 0; i <= 10; ++i) {
		printf("%d ", value);
		value *= 2;
	}
	
	printf("\n");
	
	return 0;
	
}

