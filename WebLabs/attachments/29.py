 def check(self):
        num = 1
        for row in range(4): # labels in form of 4x4 board
            for column in range(4):
                if self.my_labels[row][column]['text'] == '':
                    return
                elif int(self.my_labels[row][column].cget('text')) == num:
                    num += 1
                    continue
                elif row == 3 and column == 1:
                    # here actions when check is successfully completed