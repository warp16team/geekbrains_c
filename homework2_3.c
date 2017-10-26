#include <stdio.h>

// попытка решить задачу 3

void command(int cmd, int x, int target, int * chains)
{
	//printf("cmd=%d x=%d, chains=%d\n", cmd, x, *chains);

	if (cmd == 1) {
		x++;
		printf("+");
	} else {
		x = x * 2;
		printf("*");
	}

	if (x == target) {
		*chains = *chains+1;
		printf("\n");
	}

	//printf("x=%d, chains=%d\n", x, *chains);

	if (x < target) {
		command(1, x, target, chains);
		command(2, x, target, chains);
	}
}


int main() {
	int chains = 0;

	command(1, 3, 20, &chains);
	//command(2, 3, 20, chains);

	printf("%d", chains);
	return 0;
}
